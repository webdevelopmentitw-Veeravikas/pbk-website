<?php
use App\Core\View;

$page = $page ?? null;
$seo = [
    'title'       => $page['seo_title'] ?? $page['title'] ?? setting('leader_title', 'தலைமை'),
    'description' => $page['seo_description'] ?? setting('leader_bio', ''),
    'canonical'   => url('/leader'),
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => $page['title'] ?? setting('leader_title', 'தலைமை'), 'url' => ''],
];
?>
<div class="page-hero leader-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($page['title'] ?? setting('leader_title', 'தலைமை')) ?></h1>
<?php if ($page && !empty($page['seo_description'])): ?>
<p><?= e($page['seo_description']) ?></p>
<?php elseif (setting('leader_subtitle')): ?>
<p><?= e(setting('leader_subtitle')) ?></p>
<?php endif; ?>
</div>
</div>

<section>
<div class="wrap">
<div class="leader-layout">
<div class="leader-photo-wrap">
<?php if ($page && !empty($page['banner'])): ?>
<img class="leader-photo" src="<?= e(upload_url($page['banner'])) ?>" alt="<?= e($page['title'] ?? '') ?>" loading="lazy">
<?php else: ?>
<div class="leader-photo leader-photo-placeholder">
<span><?= e(mb_substr($page['title'] ?? setting('leader_title', 'L'), 0, 1)) ?></span>
</div>
<?php endif; ?>
<?php if (setting('leader_designation')): ?>
<div class="leader-role"><?= e(setting('leader_designation')) ?></div>
<?php endif; ?>
</div>
<div class="leader-content">
<?php if ($page && !empty($page['content'])): ?>
<div class="content rte">
<?= $page['content'] ?>
</div>
<?php else: ?>
<div class="empty-state">
<b>தலைமை சுயவிவரம் விரைவில்</b>
Admin panel-ல் leader பக்கத்தை உருவாக்கவும்.
</div>
<?php endif; ?>
<?php View::partial('frontend.partials.share-buttons', [
    'url'   => url('/leader'),
    'title' => $page['title'] ?? setting('leader_title', 'Leader'),
]); ?>
</div>
</div>
</div>
</section>
