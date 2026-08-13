<?php
$p = __DIR__ . '/../public/assets/images/membership/card-front.png';
$out = __DIR__ . '/../public/assets/images/membership/front.svg';
$b = base64_encode((string) file_get_contents($p));
$svg = <<<SVG
<?xml version="1.0" encoding="UTF-8"?>
<!-- Membership CARD FRONT — shared as-is (no member data filled). -->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="856" height="540" viewBox="0 0 324 204">
  <image x="0" y="0" width="324" height="204" preserveAspectRatio="none" href="data:image/png;base64,{$b}" xlink:href="data:image/png;base64,{$b}"/>
</svg>

SVG;
file_put_contents($out, $svg);
echo "Wrote front.svg (" . strlen($svg) . " bytes)\n";
