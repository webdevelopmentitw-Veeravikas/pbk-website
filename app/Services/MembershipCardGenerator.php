<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Member;

/**
 * Membership ID cards:
 * - front.png = shared card-front.png artwork
 * - back.png = card-back.png + member details + photo (bottom-right)
 */
final class MembershipCardGenerator
{
    private string $templateDir;
    private string $fontDir;
    private string $outputRoot;
    private string $publicRoot;

    /** Photo slot on card-back.png (bottom-right corner). */
    private const BACK_PHOTO = [
        'x' => 1580,
        'y' => 780,
        'w' => 320,
        'h' => 400,
    ];

    public function __construct()
    {
        $this->templateDir = PUBLIC_PATH . '/assets/images/membership';
        $this->fontDir = PUBLIC_PATH . '/assets/fonts';
        $this->outputRoot = STORAGE_PATH . '/membership-cards';
        $this->publicRoot = UPLOAD_PATH . '/membership-cards';
    }

    /**
     * @return array{front:string,back:string,dir:string,front_url:string,back_url:string}
     */
    public function generate(array $member): array
    {
        $mid = (string) ($member['membership_id'] ?? 'UNKNOWN');
        $safe = preg_replace('/[^A-Za-z0-9_\-]/', '_', $mid) ?: 'UNKNOWN';

        $dir = $this->outputRoot . '/' . $safe;
        $publicDir = $this->publicRoot . '/' . $safe;
        foreach ([$dir, $publicDir] as $path) {
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
        }

        $frontPath = $dir . '/front.png';
        $backPath = $dir . '/back.png';
        $publicFront = $publicDir . '/front.png';
        $publicBack = $publicDir . '/back.png';

        $this->buildFrontPng($member, $frontPath);
        $this->buildBackPng($member, $backPath);

        @copy($frontPath, $publicFront);
        @copy($backPath, $publicBack);

        return [
            'front' => $frontPath,
            'back' => $backPath,
            'dir' => $dir,
            'front_url' => 'uploads/membership-cards/' . $safe . '/front.png',
            'back_url' => 'uploads/membership-cards/' . $safe . '/back.png',
        ];
    }

    /** Front card = template artwork only. */
    public function buildFrontPng(array $member, string $outPath): void
    {
        $src = $this->templateDir . '/card-front.png';
        if (!is_file($src)) {
            throw new \RuntimeException('card-front.png template not found.');
        }

        $dir = dirname($outPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        if (!@copy($src, $outPath)) {
            throw new \RuntimeException('Unable to write membership front.png.');
        }
    }

    /**
     * Draw registration values + photo onto card-back.png and write to $outPath.
     */
    public function buildBackPng(array $member, string $outPath): void
    {
        $src = $this->templateDir . '/card-back.png';
        if (!is_file($src)) {
            throw new \RuntimeException('card-back.png template not found.');
        }

        $img = @imagecreatefrompng($src);
        if ($img === false) {
            throw new \RuntimeException('Unable to read card-back.png.');
        }

        imagealphablending($img, true);
        imagesavealpha($img, true);

        $photoPath = $this->resolvePhotoPath($member['photo'] ?? null);
        if ($photoPath !== null) {
            $this->pastePhoto($img, $photoPath, self::BACK_PHOTO, true);
        }

        $fontTamil = $this->fontPath([
            'MuktaMalar-Bold.ttf',
            'MuktaMalar-SemiBold.ttf',
            'NotoSansTamil-Bold.ttf',
            'NotoSansTamil-Regular.ttf',
        ], false, true);
        $fontLatin = $this->fontPath(['NotoSans-Bold.ttf', 'MuktaMalar-Bold.ttf'], true);

        $w = imagesx($img);
        $h = imagesy($img);

        // Positions calibrated from the original 324×204 SVG overlay layout.
        $sx = $w / 324.0;
        $sy = $h / 204.0;
        $fontSize = 10.0 * $sy * 0.72;
        $valueX = (int) round(132 * $sx);

        $white = imagecolorallocate($img, 255, 255, 255);
        $gold = imagecolorallocate($img, 255, 224, 130);
        if ($white === false || $gold === false) {
            imagedestroy($img);
            throw new \RuntimeException('Unable to allocate card text colours.');
        }

        $values = $this->values($member);
        $rows = [
            [$values['name'], 92, $white],
            [$values['father_name'], 107, $white],
            [$values['age'], 122, $white],
            [$values['join_date'], 137, $white],
            [$values['constituency'], 152, $white],
            [$values['district'], 167, $white],
            [$values['membership_id'], 182, $gold],
        ];

        foreach ($rows as [$text, $yUnit, $color]) {
            if ($text === '') {
                continue;
            }
            $y = (int) round($yUnit * $sy);
            $this->drawMixedText($img, $fontSize, $valueX, $y, $color, $text, $fontTamil, $fontLatin);
        }

        $dir = dirname($outPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        if (!imagepng($img, $outPath, 6)) {
            imagedestroy($img);
            throw new \RuntimeException('Unable to write membership back.png.');
        }
        imagedestroy($img);
    }

    /** @return array{name:string,father_name:string,age:string,join_date:string,constituency:string,district:string,membership_id:string} */
    private function values(array $member): array
    {
        $model = new Member();
        $age = $model->age($member['dob'] ?? null);
        $joined = !empty($member['created_at'])
            ? date('d-m-Y', strtotime((string) $member['created_at']))
            : date('d-m-Y');

        return [
            'name' => (string) ($member['name'] ?? ''),
            'father_name' => (string) ($member['father_name'] ?? ''),
            'age' => $age !== null ? (string) $age : '—',
            'join_date' => $joined,
            'constituency' => (string) ($member['constituency'] ?? ''),
            'district' => (string) ($member['district'] ?? ''),
            'membership_id' => (string) ($member['membership_id'] ?? ''),
        ];
    }

    private function resolvePhotoPath(mixed $photo): ?string
    {
        if (!is_string($photo) || trim($photo) === '') {
            return null;
        }

        $photo = str_replace('\\', '/', trim($photo));
        $candidates = [
            PUBLIC_PATH . '/' . ltrim($photo, '/'),
            ROOT_PATH . '/' . ltrim($photo, '/'),
            UPLOAD_PATH . '/' . ltrim(preg_replace('#^uploads/#', '', $photo) ?? $photo, '/'),
        ];

        foreach ($candidates as $path) {
            if (is_file($path)) {
                return $path;
            }
        }

        return null;
    }

    /**
     * Cover-fit member photo into a card slot.
     *
     * @param \GdImage|resource $card
     * @param array{x:int,y:int,w:int,h:int} $slot
     */
    private function pastePhoto($card, string $photoPath, array $slot, bool $withBorder = false): void
    {
        $photo = $this->loadImage($photoPath);
        if ($photo === false) {
            return;
        }

        $sw = imagesx($photo);
        $sh = imagesy($photo);
        if ($sw < 1 || $sh < 1) {
            imagedestroy($photo);
            return;
        }

        $dw = $slot['w'];
        $dh = $slot['h'];
        $scale = max($dw / $sw, $dh / $sh);
        $rw = (int) ceil($sw * $scale);
        $rh = (int) ceil($sh * $scale);
        $srcX = (int) max(0, round(($rw - $dw) / 2 / $scale));
        $srcY = (int) max(0, round(($rh - $dh) / 2 / $scale));
        $srcW = (int) min($sw, round($dw / $scale));
        $srcH = (int) min($sh, round($dh / $scale));

        if ($withBorder) {
            $border = 6;
            $white = imagecolorallocate($card, 255, 255, 255);
            if ($white !== false) {
                imagefilledrectangle(
                    $card,
                    $slot['x'] - $border,
                    $slot['y'] - $border,
                    $slot['x'] + $dw + $border - 1,
                    $slot['y'] + $dh + $border - 1,
                    $white
                );
            }
        }

        imagecopyresampled(
            $card,
            $photo,
            $slot['x'],
            $slot['y'],
            $srcX,
            $srcY,
            $dw,
            $dh,
            $srcW,
            $srcH
        );
        imagedestroy($photo);
    }

    /** @return \GdImage|resource|false */
    private function loadImage(string $path)
    {
        $info = @getimagesize($path);
        $mime = is_array($info) ? ($info['mime'] ?? '') : '';

        return match ($mime) {
            'image/jpeg', 'image/jpg' => @imagecreatefromjpeg($path),
            'image/png' => @imagecreatefrompng($path),
            'image/gif' => @imagecreatefromgif($path),
            'image/webp' => function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false,
            default => false,
        };
    }

    /**
     * Draw English + Tamil (and mixed) text with matching fonts, left-aligned.
     *
     * @param \GdImage|resource $img
     */
    private function drawMixedText(
        $img,
        float $size,
        int $x,
        int $y,
        int $color,
        string $text,
        string $fontTamil,
        string $fontLatin
    ): void {
        $text = trim($this->normalizeUtf8($text));
        if ($text === '') {
            return;
        }

        $cursorX = $x;
        $runs = $this->scriptRuns($text);
        $last = count($runs) - 1;
        foreach ($runs as $i => [$chunk, $isTamil]) {
            if ($chunk === '') {
                continue;
            }
            $font = $isTamil ? $fontTamil : $fontLatin;
            $draw = $isTamil ? $this->shapeTamilForGd($chunk) : $chunk;
            $box = @imagettfbbox($size, 0, $font, $draw);
            imagettftext($img, $size, 0, $cursorX, $y, $color, $font, $draw);
            if (is_array($box)) {
                $cursorX += (int) ceil($box[2] - $box[0]);
            } else {
                $cursorX += (int) ceil(strlen($draw) * $size * 0.55);
            }
            if ($i < $last) {
                $cursorX += (int) max(1, round($size * 0.06));
            }
        }
    }

    /**
     * Reorder Tamil syllables so GD/FreeType draws ெ ே ை on the left of
     * the final consonant (GD does not run OpenType Indic shaping).
     */
    private function shapeTamilForGd(string $text): string
    {
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        if ($chars === false || $chars === []) {
            return $text;
        }

        $out = '';
        $n = count($chars);
        $i = 0;
        while ($i < $n) {
            $cp = mb_ord($chars[$i], 'UTF-8');
            if ($cp === false || !$this->isTamilConsonant($cp)) {
                $out .= $chars[$i];
                $i++;
                continue;
            }

            $consonants = [$chars[$i]];
            $i++;
            while ($i + 1 < $n) {
                $virama = mb_ord($chars[$i], 'UTF-8');
                $next = mb_ord($chars[$i + 1], 'UTF-8');
                if ($virama === 0x0BCD && $next !== false && $this->isTamilConsonant($next)) {
                    $consonants[] = $chars[$i + 1];
                    $i += 2;
                    continue;
                }
                break;
            }

            $dead = false;
            if ($i < $n && mb_ord($chars[$i], 'UTF-8') === 0x0BCD) {
                $dead = true;
                $i++;
            }

            $matra = '';
            $mcp = 0;
            if (!$dead && $i < $n) {
                $mcp = mb_ord($chars[$i], 'UTF-8') ?: 0;
                if ($mcp >= 0x0BBE && $mcp <= 0x0BCC) {
                    $matra = $chars[$i];
                    $i++;
                } else {
                    $mcp = 0;
                }
            }

            $last = array_pop($consonants);
            $prefix = '';
            foreach ($consonants as $cons) {
                $prefix .= $cons . '்';
            }

            if ($dead) {
                $out .= $prefix . $last . '்';
            } elseif ($mcp === 0x0BCA) {
                $out .= $prefix . 'ெ' . $last . 'ா';
            } elseif ($mcp === 0x0BCB) {
                $out .= $prefix . 'ே' . $last . 'ா';
            } elseif ($mcp === 0x0BCC) {
                $out .= $prefix . 'ெ' . $last . 'ௗ';
            } elseif ($mcp === 0x0BC6 || $mcp === 0x0BC7 || $mcp === 0x0BC8) {
                $out .= $prefix . $matra . $last;
            } elseif ($matra !== '') {
                $out .= $prefix . $last . $matra;
            } else {
                $out .= $prefix . $last;
            }
        }

        return $out;
    }

    /**
     * Split text into Tamil vs non-Tamil runs for dual-font rendering.
     *
     * @return list<array{0:string,1:bool}>
     */
    private function scriptRuns(string $text): array
    {
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        if ($chars === false || $chars === []) {
            return [[$text, $this->isTamilChar(mb_substr($text, 0, 1, 'UTF-8'))]];
        }

        $runs = [];
        $buffer = '';
        $currentTamil = null;

        foreach ($chars as $ch) {
            $cp = mb_ord($ch, 'UTF-8');
            if ($currentTamil !== null && ($cp === 0x200C || $cp === 0x200D)) {
                $buffer .= $ch;
                continue;
            }
            if ($currentTamil !== null && preg_match('/^[\s\.\,\-\/\&\(\)]$/u', $ch) === 1) {
                $buffer .= $ch;
                continue;
            }

            $isTamil = $this->isTamilChar($ch);
            if ($currentTamil === null) {
                $currentTamil = $isTamil;
                $buffer = $ch;
                continue;
            }

            if ($isTamil === $currentTamil) {
                $buffer .= $ch;
                continue;
            }

            $runs[] = [$buffer, $currentTamil];
            $buffer = $ch;
            $currentTamil = $isTamil;
        }

        if ($buffer !== '') {
            $runs[] = [$buffer, (bool) $currentTamil];
        }

        return $runs;
    }

    private function isTamilChar(string $char): bool
    {
        if ($char === '') {
            return false;
        }
        $cp = mb_ord($char, 'UTF-8');
        if ($cp === false) {
            return false;
        }
        // Tamil block, Tamil Supplement, ZWJ/ZWNJ.
        return ($cp >= 0x0B80 && $cp <= 0x0BFF)
            || ($cp >= 0x11FC0 && $cp <= 0x11FFF)
            || $cp === 0x200C
            || $cp === 0x200D;
    }

    private function isTamilConsonant(int $cp): bool
    {
        static $consonants = [
            0x0B95, 0x0B99, 0x0B9A, 0x0B9C, 0x0B9E, 0x0B9F,
            0x0BA3, 0x0BA4, 0x0BA8, 0x0BA9, 0x0BAA, 0x0BAE,
            0x0BAF, 0x0BB0, 0x0BB1, 0x0BB2, 0x0BB3, 0x0BB4,
            0x0BB5, 0x0BB6, 0x0BB7, 0x0BB8, 0x0BB9,
        ];
        return in_array($cp, $consonants, true);
    }

    private function normalizeUtf8(string $text): string
    {
        if (!mb_check_encoding($text, 'UTF-8')) {
            $converted = @mb_convert_encoding($text, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            if (is_string($converted)) {
                $text = $converted;
            }
        }
        // Strip BOM / normalize spaces.
        $text = preg_replace('/^\xEF\xBB\xBF/u', '', $text) ?? $text;
        return preg_replace('/\s+/u', ' ', $text) ?? $text;
    }

    /**
     * @param list<string> $names
     */
    private function fontPath(array $names, bool $allowSystemLatin = false, bool $allowSystemTamil = false): string
    {
        foreach ($names as $name) {
            $path = $this->fontDir . '/' . $name;
            if (is_file($path)) {
                return $path;
            }
        }

        if ($allowSystemTamil) {
            foreach ([
                'C:\\Windows\\Fonts\\NirmalaB.ttf',
                'C:\\Windows\\Fonts\\nirmalab.ttf',
                'C:\\Windows\\Fonts\\Nirmala.ttf',
                'C:\\Windows\\Fonts\\nirmala.ttf',
                'C:\\Windows\\Fonts\\lathab.ttf',
                'C:\\Windows\\Fonts\\latha.ttf',
            ] as $path) {
                if (is_file($path)) {
                    return $path;
                }
            }
        }

        if ($allowSystemLatin) {
            foreach (['C:\\Windows\\Fonts\\arialbd.ttf', 'C:\\Windows\\Fonts\\arial.ttf'] as $path) {
                if (is_file($path)) {
                    return $path;
                }
            }
        }

        throw new \RuntimeException('Required card font not found in assets/fonts/.');
    }
}
