<?php
use App\Core\View;

$seo = [
    'title'       => $gallery['title'] ?? '',
    'description' => $gallery['description'] ?? '',
    'og_image'    => upload_url($gallery['cover_image'] ?? null),
    'canonical'   => url('/gallery/' . ($gallery['slug'] ?? '')),
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'தொகுப்பு', 'url' => url('/gallery')],
    ['label' => $gallery['title'] ?? '', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($gallery['title'] ?? '') ?></h1>
<?php if (!empty($gallery['description'])): ?>
<p><?= e($gallery['description']) ?></p>
<?php endif; ?>
</div>
</div>

<section>
<div class="wrap">
<?php if (!empty($gallery['images'])): ?>
<div class="gallery-grid gallery-detail-grid">
<?php foreach ($gallery['images'] as $img): ?>
<figure class="gallery-item">
<a href="<?= e(upload_url($img['image_path'] ?? null)) ?>" target="_blank" rel="noopener">
<img src="<?= e(upload_url($img['image_path'] ?? null)) ?>" alt="<?= e($img['caption'] ?? $gallery['title'] ?? '') ?>" loading="lazy">
</a>
<?php if (!empty($img['caption'])): ?><figcaption><?= e($img['caption']) ?></figcaption><?php endif; ?>
</figure>
<?php endforeach; ?>
</div>
<?php else: ?>
<div class="empty-state"><b>புகைப்படங்கள் இல்லை</b></div>
<?php endif; ?>
<div class="post-nav">
<a href="<?= e(url('/gallery')) ?>" class="btn btn-outline btn-sm">← அனைத்து தொகுப்புகள்</a>
</div>
</div>
</section>
