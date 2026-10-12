<?php
$item = $gallery ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $val('title') ?>" data-slug-source data-slug-target="#slug" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?= $val('slug') ?>">
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?= $val('description') ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Cover Image</label>
            <?php if (!empty($item['cover_image'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['cover_image']) ?>" class="image-preview w-100" alt=""></div>
            <?php endif; ?>
            <input type="file" name="cover_image" class="form-control" accept="image/*">
        </div>
        <div class="col-md-6">
            <label class="form-label">Gallery Images</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
            <div class="form-text">Select multiple images to upload</div>
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="galleryStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="galleryStatus">Active</label>
            </div>
        </div>
    </div>
</div>
