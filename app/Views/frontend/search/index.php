<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'தேடல்', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>தேடல் / Search</h1>
<form class="search-page-form" action="<?= e(url('/search')) ?>" method="get" role="search">
<input type="search" name="q" value="<?= e($query ?? '') ?>" placeholder="தேடுங்கள்…" autofocus>
<button type="submit" class="btn btn-primary">தேடு</button>
</form>
</div>
</div>

<section>
<div class="wrap">
<?php if (($query ?? '') === ''): ?>
<div class="empty-state"><b>தேடல் சொல்லை உள்ளிடவும்</b></div>
<?php else: ?>
<p class="search-summary">"<?= e($query) ?>" க்கான முடிவுகள்</p>

<?php if (!empty($posts)): ?>
<div class="search-section">
<h2>செய்திகள்</h2>
<div class="blog-grid">
<?php foreach ($posts as $post): ?>
<?php View::partial('frontend.partials.post-card', ['post' => $post]); ?>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<?php if (!empty($categories)): ?>
<div class="search-section">
<h2>வகைகள்</h2>
<div class="cat-chip-row">
<?php foreach ($categories as $cat): ?>
<a class="cat-chip" href="<?= e(url('/category/' . $cat['slug'])) ?>"><?= e($cat['name']) ?></a>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<?php if (!empty($pages)): ?>
<div class="search-section">
<h2>பக்கங்கள்</h2>
<ul class="search-pages-list">
<?php foreach ($pages as $p): ?>
<li><a href="<?= e(url('/page/' . $p['slug'])) ?>"><?= e($p['title']) ?></a></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>

<?php if (empty($posts) && empty($pages) && empty($categories)): ?>
<div class="empty-state"><b>முடிவுகள் இல்லை</b>"<?= e($query) ?>" என்ற தேடலுக்கு எதுவும் கிடைக்கவில்லை.</div>
<?php endif; ?>
<?php endif; ?>
</div>
</section>
