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
                <div class="editor-tools mb-2">
                    <span class="editor-tools-label">Layout</span>
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-editor-cols="2" data-editor-target="content" title="Insert 2 columns">
                        <i class="fa-solid fa-columns"></i> 2 Columns
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-editor-cols="3" data-editor-target="content" title="Insert 3 columns">
                        <i class="fa-solid fa-table-columns"></i> 3 Columns
                    </button>
                    <span class="editor-tools-sep"></span>
                    <span class="editor-tools-label">Media</span>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-editor-image data-editor-target="content" data-editor-file="#editorImageInput" title="Upload & insert image">
                        <i class="fa-solid fa-image"></i> Upload Image
                    </button>
                    <input type="file" id="editorImageInput" accept="image/*" hidden data-editor-image-input data-editor-target="content">
                </div>
                <textarea name="content" class="form-control ckeditor" rows="12"><?= old('content', $item['content'] ?? '') ?></textarea>
                <div class="form-text">Use <strong>2 Columns / 3 Columns</strong> to split content. Use <strong>Upload Image</strong> or the editor image button to insert photos.</div>
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
                    <?php foreach (['default', 'about', 'full-width', 'sidebar', 'contact'] as $tpl): ?>
                    <option value="<?= $tpl ?>" <?= old('template', $item['template'] ?? 'default') === $tpl ? 'selected' : '' ?>><?= ucfirst(str_replace('-', ' ', $tpl)) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
            </div>
            <div class="mb-3 form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="pageStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="pageStatus">Active</label>
            </div>
            <div class="mb-3 form-check form-switch">
                <input type="hidden" name="show_in_menu" value="0">
                <input type="checkbox" class="form-check-input" name="show_in_menu" value="1" id="pageShowInMenu" <?= old('show_in_menu', $item['show_in_menu'] ?? 0) ? 'checked' : '' ?>>
                <label class="form-check-label" for="pageShowInMenu">Show in header menu</label>
                <div class="form-text">Only selected pages appear in the website header menu.</div>
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
