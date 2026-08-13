<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'அமைப்பு', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>அமைப்பு</h1>
<p>அமைப்பு அணிகள் மற்றும் பொறுப்பாளர்கள் — தேர்ந்தெடுத்து பார்க்கவும்.</p>
<p class="mt-2"><a href="<?= url('/organization/search') ?>" class="btn-primary-sm">பொறுப்பாளர் தேடல்</a></p>
</div>
</div>

<section class="org-teams-section">
<div class="wrap">
<?php if (!empty($teams)): ?>
<div class="org-teams-grid">
<?php foreach ($teams as $team): ?>
<a href="<?= e(url('/organization/' . $team['slug'])) ?>" class="org-team-card">
    <?php if (!empty($team['image'])): ?>
    <img src="<?= e(upload_url($team['image'])) ?>" alt="<?= e($team['name']) ?>" loading="lazy">
    <?php else: ?>
    <div class="org-team-card-placeholder"><i class="fa-solid fa-users"></i></div>
    <?php endif; ?>
    <div class="org-team-card-body">
        <h3><?= e($team['name']) ?></h3>
        <span><?= (int) ($team['member_count'] ?? 0) ?> பொறுப்பாளர்கள்</span>
    </div>
</a>
<?php endforeach; ?>
</div>
<?php else: ?>
<div class="empty-state"><b>அணிகள் இல்லை</b>விரைவில் அமைப்பு அணிகள் சேர்க்கப்படும்.</div>
<?php endif; ?>
</div>
</section>
