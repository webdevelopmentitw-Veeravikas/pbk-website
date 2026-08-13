<?php
/** Printable dual-sided membership ID card (PNG) */
$member = $member ?? [];
$mid = $member['membership_id'] ?? '';
$frontUrl = $frontUrl ?? '';
$backUrl = $backUrl ?? '';
?>
<!DOCTYPE html>
<html lang="ta">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>உறுப்பினர் அட்டை - <?= e($mid) ?></title>
<link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= e(asset('assets/css/membership-card.css')) ?>">
</head>
<body>
<div class="card-actions no-print">
  <button type="button" onclick="window.print()">அச்சிடுக / Print</button>
  <a href="<?= e(url('/membership/success/' . $mid)) ?>">பின் செல்ல</a>
</div>

<div class="id-sheet">
  <div class="id-card-img id-front-img">
    <img src="<?= e($frontUrl) ?>" alt="Membership card front - <?= e($mid) ?>">
  </div>
  <div class="id-card-img id-back-img">
    <img src="<?= e($backUrl) ?>" alt="Membership card back - <?= e($mid) ?>">
  </div>
</div>
</body>
</html>
