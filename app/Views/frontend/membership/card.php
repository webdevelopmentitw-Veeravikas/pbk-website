<?php
/** Printable dual-sided membership ID card — Tamil via web fonts */
$member = $member ?? [];
$mid = $member['membership_id'] ?? '';
$age = $age ?? '';
$joined = $joined ?? '';
$photoUrl = $photoUrl ?? '';
$templateFront = $templateFront ?? asset('assets/images/membership/card-front.png');
$templateBack = $templateBack ?? asset('assets/images/membership/card-back.png');
$fontMukta = asset('assets/fonts/MuktaMalar-Bold.ttf');
$fontMuktaRegular = asset('assets/fonts/MuktaMalar-Regular.ttf');
$fontMuktaExtra = asset('assets/fonts/MuktaMalar-ExtraBold.ttf');
$fontLatin = asset('assets/fonts/NotoSans-Bold.ttf');
$fontTamilNoto = asset('assets/fonts/NotoSansTamil-Bold.ttf');
?>
<!DOCTYPE html>
<html lang="ta">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>உறுப்பினர் அட்டை - <?= e($mid) ?></title>
<link rel="preload" href="<?= e($fontMukta) ?>" as="font" type="font/ttf" crossorigin>
<link rel="preload" href="<?= e($fontMuktaExtra) ?>" as="font" type="font/ttf" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@400;600;700;800&family=Noto+Sans+Tamil:wght@400;600;700&family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
<style>
@font-face {
  font-family: "PBK Tamil";
  src: url("<?= e($fontMuktaRegular) ?>") format("truetype");
  font-weight: 400;
  font-style: normal;
  font-display: swap;
}
@font-face {
  font-family: "PBK Tamil";
  src: url("<?= e($fontMukta) ?>") format("truetype");
  font-weight: 700;
  font-style: normal;
  font-display: swap;
}
@font-face {
  font-family: "PBK Tamil";
  src: url("<?= e($fontMuktaExtra) ?>") format("truetype");
  font-weight: 800;
  font-style: normal;
  font-display: swap;
}
@font-face {
  font-family: "PBK Tamil Noto";
  src: url("<?= e($fontTamilNoto) ?>") format("truetype");
  font-weight: 700;
  font-style: normal;
  font-display: swap;
  unicode-range: U+0B80-0BFF, U+11FC0-11FFF, U+200C-200D, U+25CC;
}
@font-face {
  font-family: "PBK Latin";
  src: url("<?= e($fontLatin) ?>") format("truetype");
  font-weight: 700;
  font-style: normal;
  font-display: swap;
  unicode-range: U+0000-00FF, U+2010-2027;
}
</style>
<link rel="stylesheet" href="<?= e(asset('assets/css/membership-card.css')) ?>?v=8">
</head>
<body>
<div class="card-actions no-print">
  <button type="button" onclick="window.print()">அச்சிடுக / Print</button>
  <a href="<?= e(url('/membership/success/' . $mid)) ?>">பின் செல்ல</a>
</div>

<div class="id-sheet">
  <div class="id-card">
    <figure class="id-card-face id-front-img">
      <img class="id-card-bg" src="<?= e($templateFront) ?>" alt="Membership card front - <?= e($mid) ?>">
    </figure>
    <p class="id-card-label">முன்புறம் / Front</p>
  </div>

  <div class="id-card">
    <figure class="id-card-face id-back-img">
      <img class="id-card-bg" src="<?= e($templateBack) ?>" alt="">
      <ul class="id-data" lang="ta">
        <li><?= e($member['name'] ?? '') ?></li>
        <li><?= e($member['father_name'] ?? '') ?></li>
        <li><?= e((string) $age) ?></li>
        <li><?= e($joined) ?></li>
        <li><?= e($member['constituency'] ?? '') ?></li>
        <li><?= e($member['district'] ?? '') ?></li>
        <li class="gold"><?= e($mid) ?></li>
      </ul>
      <?php if ($photoUrl !== ''): ?>
      <img class="id-card-photo" src="<?= e($photoUrl) ?>" alt="">
      <?php endif; ?>
    </figure>
    <p class="id-card-label">பின்புறம் / Back</p>
  </div>
</div>
<script>
if (document.fonts && document.fonts.ready) {
  document.fonts.ready.then(function () {
    document.documentElement.classList.add('fonts-ready');
  });
}
</script>
</body>
</html>
