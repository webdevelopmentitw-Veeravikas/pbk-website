<?php
use App\Core\View;

$seo = [
    'title'       => $event['title'] ?? '',
    'description' => str_limit(strip_tags($event['description'] ?? ''), 160),
    'og_image'    => upload_url($event['banner'] ?? null),
    'canonical'   => url('/events/' . ($event['slug'] ?? '')),
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'நிகழ்வுகள்', 'url' => url('/events')],
    ['label' => $event['title'] ?? '', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($event['title'] ?? '') ?></h1>
<div class="event-meta-header">
<?php if (!empty($event['event_date'])): ?>
<span>📅 <?= e(format_date($event['event_date'])) ?><?php if (!empty($event['event_time'])): ?> · <?= e($event['event_time']) ?><?php endif; ?></span>
<?php endif; ?>
<?php if (!empty($event['location'])): ?>
<span>📍 <?= e($event['location']) ?></span>
<?php endif; ?>
</div>
</div>
</div>

<section>
<div class="wrap event-detail">
<?php if (!empty($event['banner'])): ?>
<img class="page-banner" src="<?= e(upload_url($event['banner'])) ?>" alt="<?= e($event['title'] ?? '') ?>" loading="lazy">
<?php endif; ?>

<?php if (!empty($event['description'])): ?>
<div class="content rte">
<?= $event['description'] ?>
</div>
<?php endif; ?>

<?php if (!empty($event['registration_link'])): ?>
<div class="event-actions">
<a href="<?= e($event['registration_link']) ?>" class="btn btn-primary" target="_blank" rel="noopener">பதிவு செய்ய / Register</a>
</div>
<?php endif; ?>

<?php if (!empty($event['map_embed'])): ?>
<div class="map-embed">
<h3>இடம் / Location</h3>
<div class="map-wrap">
<?= $event['map_embed'] ?>
</div>
</div>
<?php elseif (!empty($event['location'])): ?>
<div class="map-embed">
<h3>இடம் / Location</h3>
<p><?= e($event['location']) ?></p>
</div>
<?php endif; ?>

<?php View::partial('frontend.partials.share-buttons', [
    'url'   => url('/events/' . ($event['slug'] ?? '')),
    'title' => $event['title'] ?? '',
]); ?>

<div class="post-nav">
<a href="<?= e(url('/events')) ?>" class="btn btn-outline btn-sm">← அனைத்து நிகழ்வுகள்</a>
</div>
</div>
</section>
