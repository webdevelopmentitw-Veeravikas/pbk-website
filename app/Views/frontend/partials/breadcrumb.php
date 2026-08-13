<?php
/** @var array $breadcrumbs [['label' => '', 'url' => ''], ...] */
$breadcrumbs = $breadcrumbs ?? [];
if (empty($breadcrumbs)) {
    return;
}
?>
<nav class="breadcrumb" aria-label="Breadcrumb">
<?php foreach ($breadcrumbs as $i => $crumb): ?>
<?php if ($i > 0): ?> / <?php endif; ?>
<?php if (!empty($crumb['url']) && $i < count($breadcrumbs) - 1): ?>
<a href="<?= e($crumb['url']) ?>"><?= e($crumb['label']) ?></a>
<?php else: ?>
<span<?= $i === count($breadcrumbs) - 1 ? ' aria-current="page"' : '' ?>><?= e($crumb['label']) ?></span>
<?php endif; ?>
<?php endforeach; ?>
</nav>
