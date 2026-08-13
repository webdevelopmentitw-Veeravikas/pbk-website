<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'புகைப்பட தொகுப்பு', 'url' => ''],
];
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>புகைப்பட தொகுப்பு</h1>
<p>நிகழ்வுகள், கூட்டங்கள் மற்றும் செயல்பாடுகளின் புகைப்படங்கள்.</p>
</div>
</div>

<section>
<div class="wrap">
<?php if (!empty($galleries)): ?>
<div class="gallery-grid">
<?php foreach ($galleries as $gallery): ?>
<a href="<?= e(url('/gallery/' . $gallery['slug'])) ?>" class="gallery-card">
<img src="<?= e(upload_url($gallery['cover_image'] ?? null)) ?>" alt="<?= e($gallery['title']) ?>" loading="lazy">
<div class="gallery-card-overlay">
<h3><?= e($gallery['title']) ?></h3>
<?php if (!empty($gallery['description'])): ?>
<p><?= e(str_limit($gallery['description'], 80)) ?></p>
<?php endif; ?>
</div>
</a>
<?php endforeach; ?>
</div>
<?php else: ?>
<div class="empty-state"><b>தொகுப்புகள் இல்லை</b>விரைவில் புகைப்படங்கள் சேர்க்கப்படும்.</div>
<?php endif; ?>
</div>
</section>
