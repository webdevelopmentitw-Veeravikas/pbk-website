<?php
use App\Core\View;

$seo = [
    'title'       => $page['seo_title'] ?? $page['title'] ?? '',
    'description' => $page['seo_description'] ?? '',
    'keywords'    => $page['seo_keywords'] ?? '',
    'canonical'   => $page['canonical_url'] ?: url('/page/' . ($page['slug'] ?? '')),
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => $page['title'] ?? '', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($page['title'] ?? '') ?></h1>
</div>
</div>

<section>
<div class="wrap page-content">
<?php if (!empty($page['banner'])): ?>
<img class="page-banner" src="<?= e(upload_url($page['banner'])) ?>" alt="<?= e($page['title'] ?? '') ?>" loading="lazy">
<?php endif; ?>
<div class="content rte">
<?= $page['content'] ?? '' ?>
</div>
</div>
</section>
