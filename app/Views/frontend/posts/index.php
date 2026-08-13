<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'செய்திகள்', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= !empty($category) ? e($category['name']) : 'செய்திகள் &amp; வலைப்பதிவு' ?></h1>
<p><?= !empty($category['description']) ? e($category['description']) : 'கட்சியின் அறிவிப்புகள், அறிக்கைகள் மற்றும் நடவடிக்கைகள் குறித்த புதுப்பிப்புகள்.' ?></p>
</div>
</div>

<section>
<div class="wrap">
<?php if (!empty($categories)): ?>
<div class="cat-chip-row">
<a class="cat-chip<?= empty($category) ? ' active' : '' ?>" href="<?= e(url('/news')) ?>">அனைத்தும்</a>
<?php foreach ($categories as $cat): ?>
<a class="cat-chip<?= !empty($category) && ($category['id'] ?? null) == ($cat['id'] ?? null) ? ' active' : '' ?>" href="<?= e(url('/news?category=' . rawurlencode($cat['slug']))) ?>"><?= e($cat['name']) ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php $items = $posts['data'] ?? []; ?>
<?php if (!empty($items)): ?>
<div class="blog-grid">
<?php foreach ($items as $post): ?>
<?php View::partial('frontend.partials.post-card', ['post' => $post]); ?>
<?php endforeach; ?>
</div>
<div class="pagination-wrap">
<?= paginate_links($posts, $baseUrl ?? url('/news')) ?>
</div>
<?php else: ?>
<div class="empty-state">
<b>இதுவரை பதிவுகள் இல்லை</b>
விரைவில் புதிய செய்திகள் இங்கு வெளியிடப்படும்.
</div>
<?php endif; ?>
</div>
</section>
