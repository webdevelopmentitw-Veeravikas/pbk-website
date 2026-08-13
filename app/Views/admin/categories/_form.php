<?php
$item = $category ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= $val('name') ?>" data-slug-source data-slug-target="#slug" required>
            <?php if (isset($errors['name'])): ?><div class="invalid-feedback"><?= e($errors['name']) ?></div><?php endif; ?>
        </div>
        <div class="col-md-6">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?= $val('slug') ?>">
            <div class="slug-preview">Auto-generated from name if left blank</div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Parent Category</label>
            <select name="parent_id" class="form-select">
                <option value="">— None —</option>
                <?php foreach ($parents as $p): ?>
                <option value="<?= (int) $p['id'] ?>" <?= (string) old('parent_id', $item['parent_id'] ?? '') === (string) $p['id'] ? 'selected' : '' ?>><?= e($p['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="catStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="catStatus">Active</label>
            </div>
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?= $val('description') ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Banner Image</label>
            <?php if (!empty($item['banner'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['banner']) ?>" class="image-preview" alt=""></div>
            <?php endif; ?>
            <input type="file" name="banner" class="form-control" accept="image/*">
        </div>
        <div class="col-md-6">
            <label class="form-label">Category Image</label>
            <?php if (!empty($item['image'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['image']) ?>" class="image-preview" alt=""></div>
            <?php endif; ?>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
    </div>
</div>

<div class="form-section">
    <h5 class="mb-3"><i class="fa-solid fa-magnifying-glass me-2"></i>SEO</h5>
    <div class="row g-3">
        <div class="col-12">
            <label class="form-label">SEO Title</label>
            <input type="text" name="seo_title" class="form-control" value="<?= $val('seo_title') ?>">
        </div>
        <div class="col-12">
            <label class="form-label">SEO Description</label>
            <textarea name="seo_description" class="form-control" rows="2"><?= $val('seo_description') ?></textarea>
        </div>
        <div class="col-12">
            <label class="form-label">SEO Keywords</label>
            <input type="text" name="seo_keywords" class="form-control" value="<?= $val('seo_keywords') ?>">
        </div>
    </div>
</div>
