<?php
use App\Core\View;

$seo = [
    'title'       => $video['title'] ?? '',
    'description' => $video['description'] ?? '',
    'og_image'    => upload_url($video['thumbnail'] ?? null),
    'canonical'   => url('/videos/' . ($video['slug'] ?? '')),
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'காணொளிகள்', 'url' => url('/videos')],
    ['label' => $video['title'] ?? '', 'url' => ''],
];

$youtubeId = null;
if (!empty($video['youtube_url'])) {
    if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $video['youtube_url'], $m)) {
        $youtubeId = $m[1];
    }
}
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($video['title'] ?? '') ?></h1>
</div>
</div>

<section>
<div class="wrap video-detail">
<?php if ($youtubeId): ?>
<div class="video-embed featured">
<iframe src="https://www.youtube.com/embed/<?= e($youtubeId) ?>" title="<?= e($video['title'] ?? 'Video') ?>" allowfullscreen loading="lazy"></iframe>
</div>
<?php endif; ?>
<?php if (!empty($video['description'])): ?>
<div class="content rte">
<p><?= nl2br(e($video['description'])) ?></p>
</div>
<?php endif; ?>
<?php View::partial('frontend.partials.share-buttons', [
    'url'   => url('/videos/' . ($video['slug'] ?? '')),
    'title' => $video['title'] ?? '',
]); ?>
<div class="post-nav">
<a href="<?= e(url('/videos')) ?>" class="btn btn-outline btn-sm">← அனைத்து காணொளிகள்</a>
</div>
</div>
</section>
