<?php
use App\Core\View;

$page = $page ?? [];
$title = $page['title'] ?? 'எங்களைப் பற்றி';
$content = trim((string) ($page['content'] ?? ''));
$imageUrl = !empty($page['banner']) ? upload_url($page['banner']) : asset('assets/images/about-side.png');
$hasCustomImage = !empty($page['banner']) || is_file(PUBLIC_PATH . '/assets/images/about-side.png');

$seo = [
    'title'       => $page['seo_title'] ?? $title,
    'description' => $page['seo_description'] ?? '',
    'keywords'    => $page['seo_keywords'] ?? '',
    'canonical'   => $page['canonical_url'] ?: url('/page/' . ($page['slug'] ?? 'about')),
];

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => $title, 'url' => ''],
];
?>
<div class="page-hero about-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($title) ?></h1>
<?php if (!empty($page['seo_description'])): ?>
<p><?= e($page['seo_description']) ?></p>
<?php endif; ?>
</div>
</div>

<section class="about-section">
<div class="wrap">
<div class="about-layout">

  <div class="about-copy">
    <div class="about-content-box">
      <?php if ($content === ''): ?>
        <div class="empty-state">
          <b>உள்ளடக்கம் விரைவில்</b>
          Admin → Pages → About-ல் உள்ளடக்கத்தைச் சேர்க்கவும்.
        </div>
      <?php else: ?>
        <div class="content rte">
          <?= $content ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <aside class="about-visual">
    <div class="about-visual-frame">
      <?php if ($hasCustomImage): ?>
        <img src="<?= e($imageUrl) ?>" alt="<?= e($title) ?>" loading="lazy">
      <?php else: ?>
        <div class="about-visual-fallback">
          <span><?= e(mb_substr($title, 0, 1)) ?></span>
          <p>Admin → Pages → About → Banner Image-ல் PNG பதிவேற்றவும்</p>
        </div>
      <?php endif; ?>
    </div>
  </aside>

</div>
</div>
</section>
