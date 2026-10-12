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
<div class="video-albums-grid">
<?php foreach ($items as $video): ?>
<a href="<?= e(url('/videos/' . $video['slug'])) ?>" class="video-album-card">
<span class="video-album-cover">
<img src="<?= e(upload_url($video['thumbnail'] ?? null)) ?>" alt="<?= e($video['title']) ?>" loading="lazy">
<span class="play-icon" aria-hidden="true">▶</span>
</span>
<span class="video-album-body">
<h3><?= e($video['title']) ?></h3>
<?php if (!empty($video['description'])): ?>
<p><?= e(str_limit($video['description'], 90)) ?></p>
<?php else: ?>
<p>காணொளியை பார்க்க கிளிக் செய்யவும்</p>
<?php endif; ?>
</span>
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
