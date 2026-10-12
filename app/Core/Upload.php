<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Secure file upload with validation, thumbnails & WebP conversion.
 */
final class Upload
{
    private array $allowedImages;
    private array $allowedDocs;
    private int $maxBytes;

    public function __construct()
    {
        $this->allowedImages = config('app.allowed_images', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
        $this->allowedDocs   = config('app.allowed_docs', ['pdf', 'doc', 'docx']);
        $this->maxBytes      = ((int) config('app.upload_max_mb', 10)) * 1024 * 1024;
    }

    /**
     * Upload a single file into a subdirectory of public/uploads.
     *
     * @return array{path:string,url:string,name:string,mime:string,size:int,thumb:?string,webp:?string}|null
     */
    public function store(array $file, string $folder = 'media', bool $isImage = true): ?array
    {
        if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            return null;
        }

        if (($file['size'] ?? 0) > $this->maxBytes) {
            throw new \RuntimeException('File exceeds maximum upload size.');
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = $isImage ? $this->allowedImages : array_merge($this->allowedImages, $this->allowedDocs);

        if (!in_array($ext, $allowed, true)) {
            throw new \RuntimeException('File type not allowed.');
        }

        // MIME validation
        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($file['tmp_name']) ?: 'application/octet-stream';
        if ($isImage && !str_starts_with($mime, 'image/')) {
            throw new \RuntimeException('Invalid image file.');
        }

        $dir = UPLOAD_PATH . '/' . trim($folder, '/');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $safeName = bin2hex(random_bytes(8)) . '_' . time() . '.' . $ext;
        $dest = $dir . '/' . $safeName;

        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            throw new \RuntimeException('Failed to move uploaded file.');
        }

        $relative = 'uploads/' . trim($folder, '/') . '/' . $safeName;
        $thumb = null;
        $webp = null;

        $medium = null;
        $large = null;
        if ($isImage && extension_loaded('gd')) {
            try {
                $thumb = $this->makeThumbnail($dest, $folder);
                $medium = $this->makeVariant($dest, $folder, 'medium', (int) config('app.medium_width', 800), (int) config('app.medium_height', 600));
                $large = $this->makeVariant($dest, $folder, 'large', (int) config('app.large_width', 1600), (int) config('app.large_height', 1200));
                $webp = $this->toWebp($dest, $folder);
            } catch (\Throwable) {
                // Keep original upload even if thumbnail/webp conversion fails.
            }
        }

        return [
            'path' => $relative,
            'url'  => asset($relative),
            'name' => $file['name'],
            'mime' => $mime,
            'size' => (int) $file['size'],
            'thumb'=> $thumb,
            'medium' => $medium,
            'large' => $large,
            'webp' => $webp,
        ];
    }

    public function storeMultiple(array $files, string $folder = 'media'): array
    {
        $results = [];
        foreach ($files as $file) {
            if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_OK) {
                $stored = $this->store($file, $folder, true);
                if ($stored) {
                    $results[] = $stored;
                }
            }
        }
        return $results;
    }

    private function makeThumbnail(string $source, string $folder): ?string
    {
        $w = (int) config('app.thumbnail_width', 400);
        $h = (int) config('app.thumbnail_height', 300);
        $info = @getimagesize($source);
        if (!$info) {
            return null;
        }

        $src = $this->createImageResource($source, $info['mime']);
        if (!$src) {
            return null;
        }

        $thumbDir = UPLOAD_PATH . '/thumbnails/' . trim($folder, '/');
        if (!is_dir($thumbDir)) {
            mkdir($thumbDir, 0755, true);
        }

        $name = pathinfo($source, PATHINFO_FILENAME) . '_thumb.jpg';
        $dest = $thumbDir . '/' . $name;

        $dst = imagecreatetruecolor($w, $h);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, imagesx($src), imagesy($src));
        imagejpeg($dst, $dest, 85);
        imagedestroy($src);
        imagedestroy($dst);

        return 'uploads/thumbnails/' . trim($folder, '/') . '/' . $name;
    }

    private function makeVariant(string $source, string $folder, string $label, int $maxW, int $maxH): ?string
    {
        $info = @getimagesize($source);
        if (!$info) {
            return null;
        }

        $src = $this->createImageResource($source, $info['mime']);
        if (!$src) {
            return null;
        }

        $origW = imagesx($src);
        $origH = imagesy($src);
        $ratio = min($maxW / max(1, $origW), $maxH / max(1, $origH), 1);
        $w = (int) max(1, round($origW * $ratio));
        $h = (int) max(1, round($origH * $ratio));

        $dir = UPLOAD_PATH . '/' . $label . '/' . trim($folder, '/');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $name = pathinfo($source, PATHINFO_FILENAME) . '_' . $label . '.jpg';
        $dest = $dir . '/' . $name;

        $dst = imagecreatetruecolor($w, $h);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $origW, $origH);
        imagejpeg($dst, $dest, 85);
        imagedestroy($src);
        imagedestroy($dst);

        return 'uploads/' . $label . '/' . trim($folder, '/') . '/' . $name;
    }

    private function toWebp(string $source, string $folder): ?string
    {
        if (!function_exists('imagewebp')) {
            return null;
        }
        $info = @getimagesize($source);
        if (!$info) {
            return null;
        }
        $src = $this->createImageResource($source, $info['mime']);
        if (!$src) {
            return null;
        }

        // imagewebp() fatals on palette/indexed images (GIF / some PNGs).
        $src = $this->ensureTrueColor($src);

        $name = pathinfo($source, PATHINFO_FILENAME) . '.webp';
        $dir = UPLOAD_PATH . '/' . trim($folder, '/');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $dest = $dir . '/' . $name;

        $ok = @imagewebp($src, $dest, 80);
        imagedestroy($src);

        if (!$ok || !is_file($dest)) {
            return null;
        }

        return 'uploads/' . trim($folder, '/') . '/' . $name;
    }

    /**
     * Convert palette/indexed GD resources to truecolor for WebP and JPEG ops.
     *
     * @param \GdImage|resource $src
     * @return \GdImage|resource
     */
    private function ensureTrueColor($src)
    {
        if (imageistruecolor($src)) {
            return $src;
        }

        if (function_exists('imagepalettetotruecolor') && @imagepalettetotruecolor($src)) {
            imagealphablending($src, true);
            imagesavealpha($src, true);
            return $src;
        }

        $w = imagesx($src);
        $h = imagesy($src);
        $true = imagecreatetruecolor($w, $h);
        imagealphablending($true, false);
        imagesavealpha($true, true);
        $transparent = imagecolorallocatealpha($true, 0, 0, 0, 127);
        imagefilledrectangle($true, 0, 0, $w, $h, $transparent);
        imagealphablending($true, true);
        imagecopy($true, $src, 0, 0, 0, 0, $w, $h);
        imagedestroy($src);

        return $true;
    }

    private function createImageResource(string $path, string $mime)
    {
        return match ($mime) {
            'image/jpeg', 'image/jpg' => @imagecreatefromjpeg($path),
            'image/png'               => @imagecreatefrompng($path),
            'image/gif'               => @imagecreatefromgif($path),
            'image/webp'              => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false,
            default                   => false,
        };
    }

    public function delete(?string $relativePath): void
    {
        if (!$relativePath) {
            return;
        }
        $full = PUBLIC_PATH . '/' . ltrim($relativePath, '/');
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
