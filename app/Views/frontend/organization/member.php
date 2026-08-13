<?php
use App\Core\View;

$displayName = $member['tamil_name'] ?: $member['name'];
$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'அமைப்பு', 'url' => url('/organization')],
    ['label' => $member['team_name'] ?? 'அணி', 'url' => !empty($member['team_slug']) ? url('/organization/' . $member['team_slug']) : url('/organization')],
    ['label' => $displayName, 'url' => ''],
];

$socials = [
    'facebook' => ['icon' => 'fa-facebook-f', 'label' => 'Facebook'],
    'twitter' => ['icon' => 'fa-x-twitter', 'label' => 'Twitter'],
    'instagram' => ['icon' => 'fa-instagram', 'label' => 'Instagram'],
    'youtube' => ['icon' => 'fa-youtube', 'label' => 'YouTube'],
    'website' => ['icon' => 'fa-globe', 'label' => 'Website'],
    'whatsapp' => ['icon' => 'fa-whatsapp', 'label' => 'WhatsApp'],
];
?>
<div class="page-hero org-profile-hero">
<?php if (!empty($member['cover_image'])): ?>
<img src="<?= e(upload_url($member['cover_image'])) ?>" alt="" class="org-profile-cover" loading="eager">
<?php endif; ?>
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
</div>
</div>

<section class="org-profile-section">
<div class="wrap org-profile-layout">
    <aside class="org-profile-aside">
        <div class="org-profile-photo">
            <?php if (!empty($member['photo'])): ?>
            <img src="<?= e(upload_url($member['photo'])) ?>" alt="<?= e($displayName) ?>">
            <?php else: ?>
            <div class="org-member-photo-placeholder large"><i class="fa-solid fa-user"></i></div>
            <?php endif; ?>
        </div>
        <h1><?= e($displayName) ?></h1>
        <?php if (!empty($member['english_name'])): ?>
        <p class="org-en-name"><?= e($member['english_name']) ?></p>
        <?php endif; ?>
        <?php if (!empty($member['designation'])): ?>
        <p class="org-desig"><?= e($member['designation']) ?></p>
        <?php endif; ?>
        <?php if (!empty($member['team_name'])): ?>
        <p class="org-team-link"><a href="<?= e(url('/organization/' . ($member['team_slug'] ?? ''))) ?>"><?= e($member['team_name']) ?></a></p>
        <?php endif; ?>

        <ul class="org-profile-facts">
            <?php if (!empty($member['district'])): ?><li><span>மாவட்டம்</span><?= e($member['district']) ?></li><?php endif; ?>
            <?php if (!empty($member['assembly'])): ?><li><span>சட்டமன்ற தொகுதி</span><?= e($member['assembly']) ?></li><?php endif; ?>
            <?php if (!empty($member['parliament'])): ?><li><span>நாடாளுமன்ற தொகுதி</span><?= e($member['parliament']) ?></li><?php endif; ?>
            <?php if (!empty($member['position'])): ?><li><span>பொறுப்பு</span><?= e($member['position']) ?></li><?php endif; ?>
            <?php if (!empty($member['zone'])): ?><li><span>மண்டலம்</span><?= e($member['zone']) ?></li><?php endif; ?>
            <?php if (!empty($member['state'])): ?><li><span>மாநிலம்</span><?= e($member['state']) ?></li><?php endif; ?>
            <?php if (!empty($member['phone'])): ?><li><span>தொலைபேசி</span><a href="tel:<?= e($member['phone']) ?>"><?= e($member['phone']) ?></a></li><?php endif; ?>
            <?php if (!empty($member['email'])): ?><li><span>மின்னஞ்சல்</span><a href="mailto:<?= e($member['email']) ?>"><?= e($member['email']) ?></a></li><?php endif; ?>
        </ul>

        <div class="org-socials">
            <?php foreach ($socials as $key => $meta): ?>
                <?php if (empty($member[$key])) continue; ?>
                <?php
                $href = $member[$key];
                if ($key === 'whatsapp' && !str_starts_with($href, 'http')) {
                    $href = 'https://wa.me/' . preg_replace('/\D+/', '', $href);
                }
                ?>
                <a href="<?= e($href) ?>" target="_blank" rel="noopener" aria-label="<?= e($meta['label']) ?>"><i class="fa-brands <?= e($meta['icon']) ?>"></i></a>
            <?php endforeach; ?>
        </div>
    </aside>

    <div class="org-profile-main">
        <h2>சுயவிவரம்</h2>
        <?php if (!empty($member['biography'])): ?>
        <div class="content rte"><?= $member['biography'] ?></div>
        <?php else: ?>
        <p class="text-muted">சுயவிவர விவரம் விரைவில் சேர்க்கப்படும்.</p>
        <?php endif; ?>

        <?php if (!empty($related)): ?>
        <div class="org-related">
            <h2>தொடர்புடைய பொறுப்பாளர்கள்</h2>
            <div class="org-members-grid compact">
            <?php foreach ($related as $m): ?>
            <a href="<?= e(url('/organization/member/' . $m['id'])) ?>" class="org-member-card">
                <div class="org-member-photo">
                    <?php if (!empty($m['photo'])): ?>
                    <img src="<?= e(upload_url($m['photo'])) ?>" alt="<?= e($m['name']) ?>" loading="lazy">
                    <?php else: ?>
                    <div class="org-member-photo-placeholder"><i class="fa-solid fa-user"></i></div>
                    <?php endif; ?>
                </div>
                <div class="org-member-info">
                    <h3><?= e($m['tamil_name'] ?: $m['name']) ?></h3>
                    <?php if (!empty($m['designation'])): ?><p class="org-desig"><?= e($m['designation']) ?></p><?php endif; ?>
                </div>
            </a>
            <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
</section>
