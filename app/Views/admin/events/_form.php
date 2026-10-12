<?php
$item = $event ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-8">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="<?= $val('title') ?>" data-slug-source data-slug-target="#slug" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?= $val('slug') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Event Date</label>
            <input type="date" name="event_date" class="form-control" value="<?= $val('event_date') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Event Time</label>
            <input type="time" name="event_time" class="form-control" value="<?= $val('event_time') ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="eventStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="eventStatus">Active</label>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="<?= $val('location') ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Registration Link</label>
            <input type="url" name="registration_link" class="form-control" value="<?= $val('registration_link') ?>">
        </div>
        <div class="col-12">
            <label class="form-label">Description</label>
            <div class="editor-tools mb-2">
                <span class="editor-tools-label">Layout</span>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-editor-cols="2" data-editor-target="description">
                    <i class="fa-solid fa-columns"></i> 2 Columns
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-editor-cols="3" data-editor-target="description">
                    <i class="fa-solid fa-table-columns"></i> 3 Columns
                </button>
                <span class="editor-tools-sep"></span>
                <span class="editor-tools-label">Media</span>
                <button type="button" class="btn btn-sm btn-outline-primary" data-editor-image data-editor-target="description" data-editor-file="#editorImageInputDesc">
                    <i class="fa-solid fa-image"></i> Upload Image
                </button>
                <input type="file" id="editorImageInputDesc" accept="image/*" hidden data-editor-image-input data-editor-target="description">
            </div>
            <textarea name="description" class="form-control ckeditor" rows="6"><?= old('description', $item['description'] ?? '') ?></textarea>
        </div>
        <div class="col-12">
            <label class="form-label">Map Embed Code</label>
            <textarea name="map_embed" class="form-control" rows="3" placeholder="<iframe ...>"><?= $val('map_embed') ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Banner Image</label>
            <?php if (!empty($item['banner'])): ?><div class="mb-2"><img src="<?= upload_url($item['banner']) ?>" class="image-preview w-100" alt=""></div><?php endif; ?>
            <input type="file" name="banner" class="form-control" accept="image/*">
        </div>
    </div>
</div>
