<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'காணொளிகள்', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>காணொளிகள்</h1>
<p>செயல்பாடுகள், பேச்சுகள் மற்றும் நிகழ்வுகளின் காணொளி தொகுப்பு.</p>
</div>
</div>

<section>
<div class="wrap">
<?php $items = $videos['data'] ?? []; ?>
<?php if (!empty($items)): ?>
<div class="video-grid">
<?php foreach ($items as $video): ?>
<a href="<?= e(url('/videos/' . $video['slug'])) ?>" class="video-card">
<div class="video-thumb">
<img src="<?= e(upload_url($video['thumbnail'] ?? null)) ?>" alt="<?= e($video['title']) ?>" loading="lazy">
<span class="play-icon">▶</span>
</div>
<h3><?= e($video['title']) ?></h3>
<?php if (!empty($video['description'])): ?>
<p><?= e(str_limit($video['description'], 100)) ?></p>
<?php endif; ?>
</a>
<?php endforeach; ?>
</div>
<div class="pagination-wrap">
<?= paginate_links($videos, $baseUrl ?? url('/videos')) ?>
</div>
<?php else: ?>
<div class="empty-state"><b>காணொளிகள் இல்லை</b></div>
<?php endif; ?>
</div>
</section>
