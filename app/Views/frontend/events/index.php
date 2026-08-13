<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'நிகழ்வுகள்', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>நிகழ்வுகள்</h1>
<p>வரவிருக்கும் மற்றும் நடந்த நிகழ்வுகள்.</p>
</div>
</div>

<section>
<div class="wrap">
<?php $items = $events['data'] ?? []; ?>
<?php if (!empty($items)): ?>
<div class="event-grid">
<?php foreach ($items as $event): ?>
<a href="<?= e(url('/events/' . $event['slug'])) ?>" class="event-card">
<?php if (!empty($event['banner'])): ?>
<img src="<?= e(upload_url($event['banner'])) ?>" alt="<?= e($event['title']) ?>" loading="lazy">
<?php endif; ?>
<div class="event-card-body">
<div class="event-date"><?= e(format_date($event['event_date'] ?? null)) ?><?php if (!empty($event['event_time'])): ?> · <?= e($event['event_time']) ?><?php endif; ?></div>
<h3><?= e($event['title']) ?></h3>
<?php if (!empty($event['location'])): ?>
<p class="event-location">📍 <?= e($event['location']) ?></p>
<?php endif; ?>
</div>
</a>
<?php endforeach; ?>
</div>
<div class="pagination-wrap">
<?= paginate_links($events, $baseUrl ?? url('/events')) ?>
</div>
<?php else: ?>
<div class="empty-state"><b>நிகழ்வுகள் இல்லை</b></div>
<?php endif; ?>
</div>
</section>
