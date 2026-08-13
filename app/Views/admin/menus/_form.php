<?php
$item = $menu ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $val('title') ?>" required>
            <?php if (isset($errors['title'])): ?><div class="invalid-feedback"><?= e($errors['title']) ?></div><?php endif; ?>
        </div>
        <div class="col-md-6">
            <label class="form-label">Parent Menu</label>
            <select name="parent_id" class="form-select">
                <option value="">— None (Top Level) —</option>
                <?php foreach ($parents as $p): ?>
                <option value="<?= (int) $p['id'] ?>" <?= (string) old('parent_id', $item['parent_id'] ?? '') === (string) $p['id'] ? 'selected' : '' ?>><?= e($p['title'] ?? $p['name'] ?? '') ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">URL Type <span class="text-danger">*</span></label>
            <select name="url_type" class="form-select" required>
                <?php foreach (['internal', 'external'] as $t): ?>
                <option value="<?= $t ?>" <?= old('url_type', $item['url_type'] ?? 'internal') === $t ? 'selected' : '' ?>><?= ucfirst($t) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-8">
            <label class="form-label">URL</label>
            <input type="text" name="url" class="form-control" value="<?= $val('url') ?>" placeholder="/page/about or https://...">
        </div>
        <div class="col-md-4">
            <label class="form-label">Location <span class="text-danger">*</span></label>
            <select name="location" class="form-select" required>
                <?php foreach (['header', 'footer', 'sidebar'] as $loc): ?>
                <option value="<?= $loc ?>" <?= old('location', $item['location'] ?? 'header') === $loc ? 'selected' : '' ?>><?= ucfirst($loc) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Target <span class="text-danger">*</span></label>
            <select name="target" class="form-select" required>
                <option value="_self" <?= old('target', $item['target'] ?? '_self') === '_self' ? 'selected' : '' ?>>Same Window</option>
                <option value="_blank" <?= old('target', $item['target'] ?? '') === '_blank' ? 'selected' : '' ?>>New Window</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Icon (Font Awesome)</label>
            <input type="text" name="icon" class="form-control" value="<?= $val('icon') ?>" placeholder="fa-home">
        </div>
        <div class="col-md-4">
            <label class="form-label">Route Name</label>
            <input type="text" name="route_name" class="form-control" value="<?= $val('route_name') ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="menuStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="menuStatus">Active</label>
            </div>
        </div>
    </div>
</div>
