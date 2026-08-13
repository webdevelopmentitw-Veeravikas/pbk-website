<?php
$item = $page ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="row">
    <div class="col-lg-8">
        <div class="form-section">
            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $val('title') ?>" data-slug-source data-slug-target="#slug" required>
                <?php if (isset($errors['title'])): ?><div class="invalid-feedback"><?= e($errors['title']) ?></div><?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="<?= $val('slug') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control ckeditor" rows="12"><?= old('content', $item['content'] ?? '') ?></textarea>
            </div>
        </div>
        <div class="form-section">
            <h5 class="mb-3">SEO</h5>
            <div class="row g-3">
                <div class="col-12"><label class="form-label">SEO Title</label><input type="text" name="seo_title" class="form-control" value="<?= $val('seo_title') ?>"></div>
                <div class="col-12"><label class="form-label">SEO Description</label><textarea name="seo_description" class="form-control" rows="2"><?= $val('seo_description') ?></textarea></div>
                <div class="col-md-6"><label class="form-label">SEO Keywords</label><input type="text" name="seo_keywords" class="form-control" value="<?= $val('seo_keywords') ?>"></div>
                <div class="col-md-6"><label class="form-label">Canonical URL</label><input type="url" name="canonical_url" class="form-control" value="<?= $val('canonical_url') ?>"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-section">
            <div class="mb-3">
                <label class="form-label">Template</label>
                <select name="template" class="form-select">
                    <?php foreach (['default', 'full-width', 'sidebar', 'contact'] as $tpl): ?>
                    <option value="<?= $tpl ?>" <?= old('template', $item['template'] ?? 'default') === $tpl ? 'selected' : '' ?>><?= ucfirst(str_replace('-', ' ', $tpl)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
            </div>
            <div class="mb-3 form-check form-switch">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="pageStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="pageStatus">Active</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Banner Image</label>
                <?php if (!empty($item['banner'])): ?>
                    <div class="mb-2"><img src="<?= upload_url($item['banner']) ?>" class="image-preview w-100" alt=""></div>
                <?php endif; ?>
                <input type="file" name="banner" class="form-control" accept="image/*">
            </div>
        </div>
    </div>
</div>
