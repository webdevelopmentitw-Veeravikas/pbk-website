<?php
$item = $banner ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
$currentType = old('type', $item['type'] ?? ($type ?? 'slider'));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $val('title') ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="<?= $val('subtitle') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Type <span class="text-danger">*</span></label>
            <select name="type" class="form-select" required>
                <?php foreach ($types as $t): ?>
                <option value="<?= $t ?>" <?= $currentType === $t ? 'selected' : '' ?>><?= ucfirst($t) ?></option>
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
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select">
                <option value="">— None —</option>
                <?php foreach ($categories ?? [] as $cat): ?>
                <option value="<?= (int) $cat['id'] ?>" <?= (string) old('category_id', $item['category_id'] ?? '') === (string) $cat['id'] ? 'selected' : '' ?>><?= e($cat['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-8">
            <label class="form-label">Link URL</label>
            <input type="text" name="link" class="form-control" value="<?= $val('link') ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="bannerStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="bannerStatus">Active</label>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Starts At</label>
            <input type="datetime-local" name="starts_at" class="form-control" value="<?= !empty($item['starts_at']) ? date('Y-m-d\TH:i', strtotime($item['starts_at'])) : '' ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Ends At</label>
            <input type="datetime-local" name="ends_at" class="form-control" value="<?= !empty($item['ends_at']) ? date('Y-m-d\TH:i', strtotime($item['ends_at'])) : '' ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Banner Image <?= empty($item['id']) ? '<span class="text-danger">*</span>' : '' ?></label>
            <?php if (!empty($item['image'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['image']) ?>" class="image-preview w-100" alt=""></div>
            <?php endif; ?>
            <input type="file" name="image" class="form-control" accept="image/*" <?= empty($item['id']) ? 'required' : '' ?>>
        </div>
        <div class="col-md-6">
            <label class="form-label">Mobile Image</label>
            <?php if (!empty($item['mobile_image'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['mobile_image']) ?>" class="image-preview w-100" alt=""></div>
            <?php endif; ?>
            <input type="file" name="mobile_image" class="form-control" accept="image/*">
        </div>
    </div>
</div>
