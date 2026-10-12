<?php
/**
 * HOME PAGE TEMPLATE
 * Banner: full-width image only (no text overlay)
 * Styles: public/assets/css/home.css
 */
use App\Core\View;

$siteName = $settings['site_name'] ?? setting('site_name', 'CMS');
?>
<?php if (!empty($sliders)): ?>
<section class="hero hero-banner">
<div class="hero-slider" id="heroSlider">
<?php foreach ($sliders as $i => $slide): ?>
<div class="hero-slide<?= $i === 0 ? ' active' : '' ?>">
<?php
$img = $slide['image'] ?? '';
$link = $slide['link'] ?? '';
$alt = $slide['title'] ?? $siteName;
?>
<?php if ($img): ?>
<?php if ($link): ?>
<a href="<?= e(url($link)) ?>" class="hero-banner-link" aria-label="<?= e($alt) ?>">
<img src="<?= e(upload_url($img)) ?>" alt="<?= e($alt) ?>" class="hero-banner-img" loading="<?= $i === 0 ? 'eager' : 'lazy' ?>">
</a>
<?php else: ?>
<img src="<?= e(upload_url($img)) ?>" alt="<?= e($alt) ?>" class="hero-banner-img" loading="<?= $i === 0 ? 'eager' : 'lazy' ?>">
<?php endif; ?>
<?php endif; ?>
</div>
<?php endforeach; ?>
<?php if (count($sliders) > 1): ?>
<div class="slider-dots" id="sliderDots">
<?php foreach ($sliders as $i => $slide): ?>
<button type="button" class="slider-dot<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
</section>
<?php endif; ?>

<?php if (!empty($categories)): ?>
<section>
<div class="wrap">
<div class="section-head">
<div><div class="tag">வகைகள்</div><h2>செய்தி வகைகள்</h2></div>
<a href="<?= e(url('/news')) ?>" class="btn btn-outline btn-sm">அனைத்தும்</a>
</div>
<div class="cat-grid">
<?php foreach ($categories as $cat): ?>
<?php
    $catSlug = strtolower((string) ($cat['slug'] ?? ''));
    $catName = trim((string) ($cat['name'] ?? ''));
    if ($catSlug === 'seythigal' || $catName === 'செய்திகள்') {
        continue;
    }
?>
<div class="cat-card">
<div class="cat-icon">
<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="10" width="26" height="28" rx="2"/><path d="M32 16h6a2 2 0 0 1 2 2v18a4 4 0 0 1-4 4H10"/><line x1="11" y1="17" x2="27" y2="17"/><line x1="11" y1="23" x2="27" y2="23"/></svg>
</div>
<h3><?= e($cat['name']) ?></h3>
<div class="cat-divider"></div>
<?php if (!empty($cat['description'])): ?>
<p><?= e(str_limit($cat['description'], 120)) ?></p>
<?php endif; ?>
<a class="cat-btn" href="<?= e(url('/category/' . $cat['slug'])) ?>">
அனைத்தும் பார்க்க
<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
</a>
</div>
<?php endforeach; ?>
</div>
</div>
</section>
<?php endif; ?>

<?php if (!empty($featuredPosts)): ?>
<section class="alt">
<div class="wrap">
<div class="section-head">
<div><div class="tag">Featured</div><h2>சிறப்பு செய்திகள்</h2></div>
<a href="<?= e(url('/news')) ?>" class="btn btn-outline btn-sm">அனைத்தையும் காண</a>
</div>
<div class="blog-grid">
<?php foreach ($featuredPosts as $post): ?>
<?php View::partial('frontend.partials.post-card', ['post' => $post]); ?>
<?php endforeach; ?>
</div>
</div>
</section>
<?php endif; ?>

<?php if (!empty($latestPosts)): ?>
<section>
<div class="wrap">
<div class="section-head">
<div><div class="tag">வலைப்பதிவு</div><h2>சமீபத்திய செய்திகள் &amp; அறிக்கைகள்</h2></div>
<a href="<?= e(url('/news')) ?>" class="btn btn-outline btn-sm">அனைத்தையும் காண</a>
</div>
<div class="blog-grid">
<?php foreach ($latestPosts as $post): ?>
<?php View::partial('frontend.partials.post-card', ['post' => $post]); ?>
<?php endforeach; ?>
</div>
</div>
</section>
<?php endif; ?>

<?php if (!empty($upcomingEvents)): ?>
<section class="alt">
<div class="wrap">
<div class="section-head">
<div><div class="tag">நிகழ்வுகள்</div><h2>வரவிருக்கும் நிகழ்வுகள்</h2></div>
<a href="<?= e(url('/events')) ?>" class="btn btn-outline btn-sm">அனைத்தும்</a>
</div>
<div class="event-grid">
<?php foreach ($upcomingEvents as $event): ?>
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
</div>
</section>
<?php endif; ?>

<?php if (!empty($videos) || !empty($galleries)): ?>
<section>
<div class="wrap">
<div class="section-head">
<div><div class="tag">Media</div><h2>காணொளிகள் &amp; தொகுப்பு</h2></div>
</div>
<div class="media-teaser-grid">
<?php if (!empty($videos)): ?>
<?php $homeVideos = array_slice($videos, 0, 6); ?>
<div class="media-teaser-col">
<h3 class="teaser-title">காணொளிகள்</h3>
<div class="media-carousel" id="videoCarousel" data-interval="5500">
<div class="media-carousel-track">
<?php foreach ($homeVideos as $i => $video): ?>
<a href="<?= e(url('/videos/' . $video['slug'])) ?>" class="media-carousel-slide<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= (int) $i ?>">
<span class="media-carousel-media has-play">
<img src="<?= e(upload_url($video['thumbnail'] ?? null)) ?>" alt="<?= e($video['title']) ?>" loading="<?= $i === 0 ? 'eager' : 'lazy' ?>">
<span class="play-icon" aria-hidden="true">▶</span>
</span>
<span class="media-carousel-title"><?= e(str_limit($video['title'], 60)) ?></span>
</a>
<?php endforeach; ?>
</div>
<?php if (count($homeVideos) > 1): ?>
<button type="button" class="media-carousel-nav prev" aria-label="Previous video">‹</button>
<button type="button" class="media-carousel-nav next" aria-label="Next video">›</button>
<div class="media-carousel-dots" role="tablist" aria-label="Video slides">
<?php foreach ($homeVideos as $i => $video): ?>
<button type="button" class="media-carousel-dot<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= (int) $i ?>" aria-label="<?= e($video['title']) ?>"></button>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
<a href="<?= e(url('/videos')) ?>" class="btn btn-outline btn-sm media-teaser-btn">அனைத்து காணொளிகள்</a>
</div>
<?php endif; ?>
<?php if (!empty($galleries)): ?>
<?php $homeGalleries = array_slice($galleries, 0, 6); ?>
<div class="media-teaser-col">
<h3 class="teaser-title">புகைப்பட தொகுப்பு</h3>
<div class="media-carousel" id="galleryCarousel" data-interval="5000">
<div class="media-carousel-track">
<?php foreach ($homeGalleries as $i => $gallery): ?>
<a href="<?= e(url('/gallery/' . $gallery['slug'])) ?>" class="media-carousel-slide<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= (int) $i ?>">
<span class="media-carousel-media">
<img src="<?= e(upload_url($gallery['cover_image'] ?? null)) ?>" alt="<?= e($gallery['title']) ?>" loading="<?= $i === 0 ? 'eager' : 'lazy' ?>">
</span>
<span class="media-carousel-title"><?= e($gallery['title']) ?></span>
</a>
<?php endforeach; ?>
</div>
<?php if (count($homeGalleries) > 1): ?>
<button type="button" class="media-carousel-nav prev" aria-label="Previous gallery">‹</button>
<button type="button" class="media-carousel-nav next" aria-label="Next gallery">›</button>
<div class="media-carousel-dots" role="tablist" aria-label="Gallery slides">
<?php foreach ($homeGalleries as $i => $gallery): ?>
<button type="button" class="media-carousel-dot<?= $i === 0 ? ' active' : '' ?>" data-slide="<?= (int) $i ?>" aria-label="<?= e($gallery['title']) ?>"></button>
<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
<a href="<?= e(url('/gallery')) ?>" class="btn btn-outline btn-sm media-teaser-btn">அனைத்து தொகுப்புகள்</a>
</div>
<?php endif; ?>
</div>
</div>
</section>
<?php endif; ?>
