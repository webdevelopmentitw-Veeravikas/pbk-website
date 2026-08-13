<?php $m = $member ?? []; ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">Member #<?= e($m['membership_id'] ?? '') ?></h1>
  <a class="btn btn-outline-secondary" href="<?= e(url('/admin/members')) ?>">Back</a>
</div>
<div class="card">
  <div class="card-body">
    <div class="row g-3">
      <div class="col-md-3">
        <?php if (!empty($m['photo'])): ?>
          <img src="<?= e(upload_url($m['photo'])) ?>" class="img-fluid rounded border" alt="">
        <?php endif; ?>
      </div>
      <div class="col-md-9">
        <dl class="row mb-0">
          <dt class="col-sm-3">Name</dt><dd class="col-sm-9"><?= e($m['name'] ?? '') ?></dd>
          <dt class="col-sm-3">Father</dt><dd class="col-sm-9"><?= e($m['father_name'] ?? '') ?></dd>
          <dt class="col-sm-3">Gender / DOB</dt><dd class="col-sm-9"><?= e($m['gender'] ?? '') ?> / <?= e($m['dob'] ?? '') ?></dd>
          <dt class="col-sm-3">Phone</dt><dd class="col-sm-9"><?= e($m['phone'] ?? '') ?></dd>
          <dt class="col-sm-3">Email</dt><dd class="col-sm-9"><?= e($m['email'] ?? '') ?></dd>
          <dt class="col-sm-3">Address</dt><dd class="col-sm-9"><?= e($m['address'] ?? '') ?></dd>
          <dt class="col-sm-3">District</dt><dd class="col-sm-9"><?= e($m['district'] ?? '') ?> / <?= e($m['constituency'] ?? '') ?></dd>
          <dt class="col-sm-3">Booth / Voter</dt><dd class="col-sm-9"><?= e($m['booth_no'] ?? '—') ?> / <?= e($m['voter_id'] ?? '—') ?></dd>
        </dl>
        <a class="btn btn-primary mt-3" target="_blank" href="<?= e(url('/membership/card/' . ($m['membership_id'] ?? ''))) ?>">Open Card</a>
      </div>
    </div>
  </div>
</div>
