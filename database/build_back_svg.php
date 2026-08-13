<?php
/**
 * Build back.svg from card-back.png artwork + value placeholders.
 * php database/build_back_svg.php
 */
$png = __DIR__ . '/../public/assets/images/membership/card-back.png';
$out = __DIR__ . '/../public/assets/images/membership/back.svg';
$b = base64_encode((string) file_get_contents($png));

// Labels are painted on the PNG; only values are placeholders.
$svg = <<<SVG
<?xml version="1.0" encoding="UTF-8"?>
<!--
  Membership CARD BACK — same design artwork; values filled on submit.
  Placeholders: {{NAME}} {{FATHER_NAME}} {{AGE}} {{JOIN_DATE}} {{CONSTITUENCY}} {{DISTRICT}} {{MEMBER_ID}}
-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="856" height="540" viewBox="0 0 324 204">
  <image x="0" y="0" width="324" height="204" preserveAspectRatio="none" href="data:image/png;base64,{$b}" xlink:href="data:image/png;base64,{$b}"/>
  <g fill="#ffffff" font-size="10" font-family="Mukta Malar, Noto Sans Tamil, Arial, sans-serif" font-weight="700">
    <text x="132" y="92">{{NAME}}</text>
    <text x="132" y="107">{{FATHER_NAME}}</text>
    <text x="132" y="122">{{AGE}}</text>
    <text x="132" y="137">{{JOIN_DATE}}</text>
    <text x="132" y="152">{{CONSTITUENCY}}</text>
    <text x="132" y="167">{{DISTRICT}}</text>
    <text x="132" y="182" fill="#ffe082">{{MEMBER_ID}}</text>
  </g>
</svg>

SVG;

file_put_contents($out, $svg);
echo "Wrote back.svg (" . strlen($svg) . " bytes)\n";
