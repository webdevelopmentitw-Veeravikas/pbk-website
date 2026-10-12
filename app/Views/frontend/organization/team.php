<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'அமைப்பு', 'url' => url('/organization')],
    ['label' => $team['name'], 'url' => ''],
];
$rows = $members['data'] ?? [];
$filters = $filters ?? [];
$queryBase = url('/organization/' . $team['slug']) . '?' . http_build_query(array_filter($filters));
?>
<div class="page-hero org-team-hero">
<?php if (!empty($team['banner'])): ?>
<img src="<?= e(upload_url($team['banner'])) ?>" alt="" class="org-team-banner" loading="eager">
<?php endif; ?>
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1><?= e($team['name']) ?></h1>
<?php if (!empty($team['description'])): ?>
<div class="org-team-desc content rte"><?= $team['description'] ?></div>
<?php endif; ?>
</div>
</div>

<section>
<div class="wrap">
<form method="GET" class="org-filter-bar" action="<?= e(url('/organization/' . $team['slug'])) ?>">
    <input type="search" name="q" value="<?= e($filters['q'] ?? '') ?>" placeholder="தேடல்…">
    <select name="district">
        <option value="">மாவட்டம்</option>
        <?php foreach ($districts as $d): ?>
        <option value="<?= e($d) ?>" <?= ($filters['district'] ?? '') === $d ? 'selected' : '' ?>><?= e($d) ?></option>
        <?php endforeach; ?>
    </select>
    <select name="assembly">
        <option value="">தொகுதி</option>
        <?php foreach ($assemblies as $a): ?>
        <option value="<?= e($a) ?>" <?= ($filters['assembly'] ?? '') === $a ? 'selected' : '' ?>><?= e($a) ?></option>
        <?php endforeach; ?>
    </select>
    <select name="position">
        <option value="">பொறுப்பு</option>
        <?php foreach ($positions as $p): ?>
        <option value="<?= e($p) ?>" <?= ($filters['position'] ?? '') === $p ? 'selected' : '' ?>><?= e($p) ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">வடிகட்டு</button>
</form>

<?php if (!empty($rows)): ?>
<div class="org-members-grid">
<?php foreach ($rows as $m): ?>
<article class="org-member-card">
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
        <ul class="org-meta">
            <?php if (!empty($m['assembly'])): ?><li><span>தொகுதி</span> <?= e($m['assembly']) ?></li><?php endif; ?>
            <?php if (!empty($m['district'])): ?><li><span>மாவட்டம்</span> <?= e($m['district']) ?></li><?php endif; ?>
            <?php if (!empty($m['phone'])): ?><li><span>தொலைபேசி</span> <?= e($m['phone']) ?></li><?php endif; ?>
        </ul>
        <a href="<?= e(url('/organization/member/' . $m['id'])) ?>" class="org-view-btn">சுயவிவரம் பார்க்க</a>
    </div>
</article>
<?php endforeach; ?>
</div>
<div class="pagination-wrap">
<?= paginate_links($members, $queryBase) ?>
</div>
<?php else: ?>
<div class="empty-state"><b>பொறுப்பாளர்கள் இல்லை</b>இந்த அணியில் பொறுப்பாளர்கள் இன்னும் சேர்க்கப்படவில்லை.</div>
<?php endif; ?>
</div>
</section>
