<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'செய்திகள்', 'url' => url('/news')],
    ['label' => $category['name'] ?? '', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<div class="cat-page-icon">
<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="10" width="26" height="28" rx="2"/><path d="M32 16h6a2 2 0 0 1 2 2v18a4 4 0 0 1-4 4H10"/><line x1="11" y1="17" x2="27" y2="17"/><line x1="11" y1="23" x2="27" y2="23"/></svg>
</div>
<h1><?= e($category['name'] ?? '') ?></h1>
<?php if (!empty($category['description'])): ?>
<p><?= e($category['description']) ?></p>
<?php endif; ?>
</div>
</div>

<section>
<div class="wrap">
<?php $items = $posts['data'] ?? []; ?>
<?php if (!empty($items)): ?>
<div class="blog-grid">
<?php foreach ($items as $post): ?>
<?php View::partial('frontend.partials.post-card', ['post' => $post]); ?>
<?php endforeach; ?>
</div>
<div class="pagination-wrap">
<?= paginate_links($posts, $baseUrl ?? url('/category/' . ($category['slug'] ?? ''))) ?>
</div>
<?php else: ?>
<div class="empty-state">
<b>இந்த வகையில் பதிவுகள் இல்லை</b>
<a href="<?= e(url('/news')) ?>">← அனைத்து செய்திகளும்</a>
</div>
<?php endif; ?>
</div>
</section>
