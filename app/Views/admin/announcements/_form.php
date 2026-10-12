<?php
$item = $announcement ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-8">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="<?= $val('title') ?>" required>
        </div>
        <div class="col-md-4">
            <label class="form-label">Type <span class="text-danger">*</span></label>
            <select name="type" class="form-select" required>
                <?php foreach ($types as $t): ?>
                <option value="<?= $t ?>" <?= old('type', $item['type'] ?? 'breaking') === $t ? 'selected' : '' ?>><?= ucfirst($t) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="4"><?= $val('content') ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Link URL</label>
            <input type="text" name="link" class="form-control" value="<?= $val('link') ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Starts At</label>
            <input type="datetime-local" name="starts_at" class="form-control" value="<?= !empty($item['starts_at']) ? date('Y-m-d\TH:i', strtotime($item['starts_at'])) : '' ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Ends At</label>
            <input type="datetime-local" name="ends_at" class="form-control" value="<?= !empty($item['ends_at']) ? date('Y-m-d\TH:i', strtotime($item['ends_at'])) : '' ?>">
        </div>
        <div class="col-12">
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="annStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="annStatus">Active</label>
            </div>
        </div>
    </div>
</div>
