<?php
/**
 * Build high-res print backgrounds (exact artwork, no member text).
 * php database/build_card_hires.php
 */

function upscalePng(string $srcPath, string $outPath, int $targetW = 2024): void
{
    $src = imagecreatefrompng($srcPath);
    if (!$src) {
        throw new RuntimeException("Cannot read {$srcPath}");
    }
    $sw = imagesx($src);
    $sh = imagesy($src);
    $th = (int) round($targetW * ($sh / max(1, $sw)));

    $dst = imagecreatetruecolor($targetW, $th);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
    imagefilledrectangle($dst, 0, 0, $targetW, $th, $transparent);
    imagealphablending($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $targetW, $th, $sw, $sh);
    imagepng($dst, $outPath, 5);
    imagedestroy($src);
    imagedestroy($dst);
    echo basename($outPath) . " {$targetW}x{$th}\n";
}

$dir = __DIR__ . '/../public/assets/images/membership';
upscalePng($dir . '/card-front.png', $dir . '/card-front-hires.png');
upscalePng($dir . '/card-back.png', $dir . '/card-back-hires.png');
echo "Done.\n";
