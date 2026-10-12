<?php
use App\Core\View;

$breadcrumbs = [
    ['label' => 'முகப்பு', 'url' => url('/')],
    ['label' => 'அமைப்பு', 'url' => url('/organization')],
    ['label' => 'பொறுப்பாளர் தேடல்', 'url' => ''],
];
$rows = $members['data'] ?? [];
$filters = $filters ?? [];
$queryBase = url('/organization/search') . '?' . http_build_query(array_filter([
    'q' => $filters['q'] ?? '',
    'team_id' => $filters['team_id'] ?? '',
    'district' => $filters['district'] ?? '',
    'assembly' => $filters['assembly'] ?? '',
    'position' => $filters['position'] ?? '',
]));
?>
<div class="page-hero">
<div class="wrap">
<?php View::partial('frontend.partials.breadcrumb', compact('breadcrumbs')); ?>
<h1>பொறுப்பாளர் தேடல்</h1>
<p>அணி, மாவட்டம், தொகுதி அல்லது பொறுப்பு அடிப்படையில் தேடவும்.</p>
</div>
</div>

<section>
<div class="wrap">
<form method="GET" class="org-filter-bar" action="<?= e(url('/organization/search')) ?>">
    <input type="search" name="q" value="<?= e($filters['q'] ?? '') ?>" placeholder="பெயர் / பதவி…">
    <select name="team_id">
        <option value="">அனைத்து அணிகள்</option>
        <?php foreach ($teams as $t): ?>
        <option value="<?= (int) $t['id'] ?>" <?= (string) ($filters['team_id'] ?? '') === (string) $t['id'] ? 'selected' : '' ?>><?= e($t['name']) ?></option>
        <?php endforeach; ?>
    </select>
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
    <button type="submit">தேடு</button>
</form>

<?php if (!empty($rows)): ?>
<p class="org-result-count"><?= (int) ($members['total'] ?? 0) ?> முடிவுகள்</p>
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
        <?php if (!empty($m['team_name'])): ?><p class="org-team-mini"><?= e($m['team_name']) ?></p><?php endif; ?>
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
<div class="empty-state"><b>முடிவுகள் இல்லை</b>வேறு வடிகட்டிகளுடன் முயற்சிக்கவும்.</div>
<?php endif; ?>
</div>
</section>
