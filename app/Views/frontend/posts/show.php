<?php
use App\Core\View;

$postUrl = url('/post/' . ($post['slug'] ?? ''));
$featuredPath = trim((string) ($post['featured_image'] ?? ''));
$ogOverride = trim((string) ($post['og_image'] ?? ''));
// Share preview must use the post featured image (custom OG URL only if none).
$shareImagePath = $featuredPath !== '' ? $featuredPath : ($ogOverride !== '' ? $ogOverride : null);
$shareImage = $shareImagePath ? upload_url($shareImagePath) : '';

$seo = [
    'title'       => $post['seo_title'] ?? $post['title'] ?? '',
    'description' => $post['seo_description'] ?? $post['short_description'] ?? '',
    'keywords'    => $post['seo_keywords'] ?? '',
    'canonical'   => $post['canonical_url'] ?: $postUrl,
    'og_image'    => $shareImage,
    'og_type'     => 'article',
    'schema'      => [
        '@context' => 'https://schema.org',
        '@type'    => 'NewsArticle',
        'headline' => $post['title'] ?? '',
        'datePublished' => $post['publish_date'] ?? $post['created_at'] ?? '',
        'author'   => ['@type' => 'Person', 'name' => $post['author_name'] ?? ''],
        'image'    => $shareImage !== '' ? [$shareImage] : [],
        'url'      => $postUrl,
    ],
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'செய்திகள்', 'url' => url('/news')],
];
if (!empty($post['category_name']) && !empty($post['category_slug'])) {
    $breadcrumbs[] = ['label' => $post['category_name'], 'url' => url('/category/' . $post['category_slug'])];
}
$breadcrumbs[] = ['label' => $post['title'] ?? '', 'url' => ''];

$youtubeId = null;
if (!empty($post['youtube_url'])) {
    if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $post['youtube_url'], $m)) {
        $youtubeId = $m[1];
    }
}
?>
<article class="post-detail">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>

<?php if (!empty($post['featured_image'])): ?>
<img class="cover" src="<?= e(upload_url($post['featured_image'])) ?>" alt="<?= e($post['title'] ?? '') ?>" loading="lazy">
<?php endif; ?>

<?php if (!empty($post['category_name'])): ?>
<a class="cat-pill" href="<?= e(url('/category/' . ($post['category_slug'] ?? ''))) ?>"><?= e($post['category_name']) ?></a>
<?php endif; ?>

<h1><?= e($post['title'] ?? '') ?></h1>
<div class="meta">
<span><?= e(format_date($post['publish_date'] ?? $post['created_at'] ?? null, 'd M Y, H:i')) ?></span>
<?php if (!empty($post['author_name'])): ?> · <span><?= e($post['author_name']) ?></span><?php endif; ?>
<?php if (isset($post['views'])): ?> · <span><?= (int) $post['views'] ?> views</span><?php endif; ?>
</div>

<?php View::partial('frontend.partials.share-buttons', [
    'url' => $postUrl,
    'title' => $post['title'] ?? '',
    'description' => $post['short_description'] ?? ($post['seo_description'] ?? ''),
    'image' => $shareImage,
]); ?>

<div class="content post-content">
<?= $post['content'] ?? '' ?>
</div>

<?php if ($youtubeId): ?>
<div class="video-embed">
<iframe src="https://www.youtube.com/embed/<?= e($youtubeId) ?>" title="<?= e($post['title'] ?? 'Video') ?>" allowfullscreen loading="lazy"></iframe>
</div>
<?php endif; ?>

<?php if (!empty($post['pdf_attachment'])): ?>
<div class="pdf-download">
<a href="<?= e(upload_url($post['pdf_attachment'])) ?>" class="btn btn-outline btn-sm" download target="_blank" rel="noopener">PDF பதிவிறக்கம்</a>
</div>
<?php endif; ?>

<?php if (!empty($post['images'])): ?>
<div class="post-gallery">
<h3>புகைப்பட தொகுப்பு</h3>
<div class="gallery-grid">
<?php foreach ($post['images'] as $img): ?>
<figure>
<img src="<?= e(upload_url($img['image_path'] ?? null)) ?>" alt="<?= e($img['caption'] ?? $post['title'] ?? '') ?>" loading="lazy">
<?php if (!empty($img['caption'])): ?><figcaption><?= e($img['caption']) ?></figcaption><?php endif; ?>
</figure>
<?php endforeach; ?>
</div>
</div>
<?php endif; ?>

<?php if (!empty($tags)): ?>
<div class="post-tags">
<?php foreach ($tags as $tag): ?>
<span class="tag-pill"><?= e($tag['name'] ?? '') ?></span>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php View::partial('frontend.partials.share-buttons', [
    'url' => $postUrl,
    'title' => $post['title'] ?? '',
    'description' => $post['short_description'] ?? ($post['seo_description'] ?? ''),
    'image' => $shareImage,
]); ?>

<div class="post-nav">
<a href="<?= e(url('/news')) ?>" class="btn btn-outline btn-sm">← அனைத்து செய்திகளும்</a>
</div>
</div>
</article>

<?php if (!empty($relatedPosts)): ?>
<section class="alt">
<div class="wrap">
<div class="section-head">
<div><h2>தொடர்புடைய செய்திகள்</h2></div>
</div>
<div class="blog-grid">
<?php foreach ($relatedPosts as $related): ?>
<?php View::partial('frontend.partials.post-card', ['post' => $related]); ?>
<?php endforeach; ?>
</div>
</div>
</section>
<?php endif; ?>
