<?php
/** @var array $post */
$showExcerpt = $showExcerpt ?? true;
$postUrl = url('/post/' . ($post['slug'] ?? ''));
$image = upload_url($post['featured_image'] ?? null);
$categoryName = $post['category_name'] ?? null;
$categorySlug = $post['category_slug'] ?? null;
?>
<article class="post-card">
<a href="<?= e($postUrl) ?>" class="post-card-link">
<div class="cover<?= empty($post['featured_image']) ? ' empty' : '' ?>"<?= !empty($post['featured_image']) ? ' style="background-image:url(' . e($image) . ')"' : '' ?>>
<?php if (!empty($post['is_breaking'])): ?>
<span class="badge-breaking">Breaking</span>
<?php endif; ?>
</div>
<div class="body">
<?php if ($categoryName): ?>
<span class="cat-pill"><?= e($categoryName) ?></span>
<?php endif; ?>
<div class="date"><?= e(format_date($post['publish_date'] ?? $post['created_at'] ?? null)) ?></div>
<h3><?= e($post['title'] ?? '') ?></h3>
<?php if ($showExcerpt && !empty($post['short_description'])): ?>
<p><?= e(str_limit($post['short_description'], 140)) ?></p>
<?php endif; ?>
<span class="readmore">முழுவதும் படிக்க →</span>
</div>
</a>
</article>
