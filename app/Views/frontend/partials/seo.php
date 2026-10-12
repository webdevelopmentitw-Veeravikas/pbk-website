<?php
/** @var array|null $seo */
$seo = $seo ?? [];
$siteName = $settings['site_name'] ?? setting('site_name', config('app.name', 'CMS'));
$title = $seo['title'] ?? ($siteName);
$description = $seo['description'] ?? setting('meta_description', $settings['site_tagline'] ?? '');
$keywords = $seo['keywords'] ?? setting('meta_keywords', '');
$canonical = $seo['canonical'] ?? (url(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'));
$ogImage = trim((string) ($seo['og_image'] ?? ''));
if ($ogImage === '') {
    $ogImage = upload_url($settings['logo'] ?? '');
}
// Social crawlers require an absolute URL.
if ($ogImage !== '' && !preg_match('#^https?://#i', $ogImage)) {
    $ogImage = url(ltrim($ogImage, '/'));
}
$ogType = $seo['og_type'] ?? 'website';
$fullTitle = ($seo['title'] ?? '') !== '' && ($seo['title'] ?? '') !== $siteName
    ? e($title) . ' | ' . e($siteName)
    : e($title);
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $fullTitle ?></title>
<?php if ($description): ?>
<meta name="description" content="<?= e($description) ?>">
<?php endif; ?>
<?php if ($keywords): ?>
<meta name="keywords" content="<?= e($keywords) ?>">
<?php endif; ?>
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:site_name" content="<?= e($siteName) ?>">
<meta property="og:title" content="<?= e($title) ?>">
<?php if ($description): ?>
<meta property="og:description" content="<?= e($description) ?>">
<?php endif; ?>
<meta property="og:type" content="<?= e($ogType) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<?php if ($ogImage): ?>
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="og:image:secure_url" content="<?= e($ogImage) ?>">
<meta property="og:image:alt" content="<?= e($title) ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($title) ?>">
<?php if ($description): ?>
<meta name="twitter:description" content="<?= e($description) ?>">
<?php endif; ?>
<?php if ($ogImage): ?>
<meta name="twitter:image" content="<?= e($ogImage) ?>">
<?php endif; ?>
<?php if (!empty($settings['favicon'])): ?>
<link rel="icon" href="<?= e(upload_url($settings['favicon'])) ?>">
<?php endif; ?>
<?php if (!empty($seo['schema'])): ?>
<script type="application/ld+json"><?= is_string($seo['schema']) ? $seo['schema'] : json_encode($seo['schema'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
<?php endif; ?>
