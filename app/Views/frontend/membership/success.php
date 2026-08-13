<?php
$member = $member ?? [];
$mid = $member['membership_id'] ?? '';
?>
<link rel="stylesheet" href="<?= e(asset('assets/css/membership.css')) ?>">
<section class="membership-page">
<div class="wrap">
<div class="membership-card success-card">
  <div class="success-badge">✓</div>
  <h1>பதிவு வெற்றிகரமாக முடிந்தது!</h1>
  <p class="lead">உங்கள் உறுப்பினர் எண்</p>
  <div class="membership-id"><?= e($mid) ?></div>
  <p>உறுதிப்படுத்தல் மின்னஞ்சல் <strong><?= e($member['email'] ?? '') ?></strong> முகவரிக்கு அனுப்பப்பட்டுள்ளது.</p>
  <p class="lead" style="margin-top:8px;font-size:15px;">Front &amp; Back உறுப்பினர் அட்டை PNG கோப்புகள் அந்த மின்னஞ்சலில் இணைக்கப்பட்டுள்ளன.</p>
  <div class="ms-actions">
    <a class="btn btn-primary" href="<?= e(url('/membership/card/' . $mid)) ?>" target="_blank">உறுப்பினர் அட்டை அச்சிடுக</a>
    <a class="btn btn-outline" href="<?= e(url('/')) ?>">முகப்பு</a>
  </div>
</div>
</div>
</section>
