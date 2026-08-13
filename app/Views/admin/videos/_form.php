<?php
$item = $video ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="<?= $val('title') ?>" data-slug-source data-slug-target="#slug" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?= $val('slug') ?>">
        </div>
        <div class="col-12">
            <label class="form-label">YouTube URL <span class="text-danger">*</span></label>
            <input type="url" name="youtube_url" class="form-control" value="<?= $val('youtube_url') ?>" placeholder="https://www.youtube.com/watch?v=..." required>
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"><?= $val('description') ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Custom Thumbnail</label>
            <?php if (!empty($item['thumbnail'])): ?><div class="mb-2"><img src="<?= upload_url($item['thumbnail']) ?>" class="image-preview" alt=""></div><?php endif; ?>
            <input type="file" name="thumbnail" class="form-control" accept="image/*">
        </div>
        <div class="col-md-6 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="videoStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="videoStatus">Active</label>
            </div>
        </div>
    </div>
</div>
