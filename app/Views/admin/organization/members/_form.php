<?php
$item = $member ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
$preselectTeam = $preselectTeam ?? 0;
?>
<div class="form-section">
    <h5 class="mb-3">Basic Info</h5>
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Team <span class="text-danger">*</span></label>
            <select name="team_id" class="form-select <?= isset($errors['team_id']) ? 'is-invalid' : '' ?>" required>
                <option value="">— Select Team —</option>
                <?php foreach ($teams as $t): ?>
                <option value="<?= (int) $t['id'] ?>" <?= (string) old('team_id', $item['team_id'] ?? $preselectTeam) === (string) $t['id'] ? 'selected' : '' ?>><?= e($t['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Display Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= $val('name') ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Profile Photo</label>
            <?php if (!empty($item['photo'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['photo']) ?>" class="image-preview rounded" alt="" style="max-height:120px;"></div>
            <?php endif; ?>
            <input type="file" name="photo" class="form-control" accept="image/jpeg,image/png,image/webp,image/gif" data-preview="#photoPreview">
            <div class="form-text">JPG, PNG, or WebP. Shown on the organization page.</div>
            <img id="photoPreview" class="image-preview mt-2 d-none rounded" alt="" style="max-height:120px;">
        </div>
        <div class="col-md-6">
            <label class="form-label">Tamil Name</label>
            <input type="text" name="tamil_name" class="form-control" value="<?= $val('tamil_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">English Name</label>
            <input type="text" name="english_name" class="form-control" value="<?= $val('english_name') ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control" value="<?= $val('designation') ?>">
        </div>
        <div class="col-md-6">
            <label class="form-label">Position</label>
            <input type="text" name="position" class="form-control" value="<?= $val('position') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Display Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Joining Date</label>
            <input type="date" name="joining_date" class="form-control" value="<?= $val('joining_date') ?>">
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="hidden" name="featured" value="0">
                <input type="checkbox" class="form-check-input" name="featured" value="1" id="memFeatured" <?= old('featured', $item['featured'] ?? 0) ? 'checked' : '' ?>>
                <label class="form-check-label" for="memFeatured">Featured</label>
            </div>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="memStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="memStatus">Enabled</label>
            </div>
        </div>
    </div>
</div>

<div class="form-section">
    <h5 class="mb-3">Location</h5>
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Assembly Constituency</label>
            <input type="text" name="assembly" class="form-control" value="<?= $val('assembly') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Parliament Constituency</label>
            <input type="text" name="parliament" class="form-control" value="<?= $val('parliament') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">District</label>
            <input type="text" name="district" class="form-control" value="<?= $val('district') ?>">
        </div>
        <div class="col-12">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="2"><?= $val('address') ?></textarea>
        </div>
        <div class="col-md-4">
            <label class="form-label">State</label>
            <input type="text" name="state" class="form-control" value="<?= $val('state', 'தமிழ்நாடு') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Zone</label>
            <input type="text" name="zone" class="form-control" value="<?= $val('zone') ?>">
        </div>
    </div>
</div>

<div class="form-section">
    <h5 class="mb-3">Contact & Social</h5>
    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= $val('phone') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">WhatsApp</label>
            <input type="text" name="whatsapp" class="form-control" value="<?= $val('whatsapp') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $val('email') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Facebook</label>
            <input type="url" name="facebook" class="form-control" value="<?= $val('facebook') ?>" placeholder="https://">
        </div>
        <div class="col-md-4">
            <label class="form-label">Twitter / X</label>
            <input type="url" name="twitter" class="form-control" value="<?= $val('twitter') ?>" placeholder="https://">
        </div>
        <div class="col-md-4">
            <label class="form-label">Instagram</label>
            <input type="url" name="instagram" class="form-control" value="<?= $val('instagram') ?>" placeholder="https://">
        </div>
        <div class="col-md-4">
            <label class="form-label">YouTube</label>
            <input type="url" name="youtube" class="form-control" value="<?= $val('youtube') ?>" placeholder="https://">
        </div>
        <div class="col-md-4">
            <label class="form-label">Website</label>
            <input type="url" name="website" class="form-control" value="<?= $val('website') ?>" placeholder="https://">
        </div>
    </div>
</div>

<div class="form-section">
    <h5 class="mb-3">Media & Bio</h5>
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Cover Image</label>
            <?php if (!empty($item['cover_image'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['cover_image']) ?>" class="image-preview" alt="" style="max-height:120px;"></div>
            <?php endif; ?>
            <input type="file" name="cover_image" class="form-control" accept="image/jpeg,image/png,image/webp" data-preview="#coverPreview">
            <img id="coverPreview" class="image-preview mt-2 d-none" alt="" style="max-height:120px;">
        </div>
        <div class="col-12">
            <label class="form-label">Biography</label>
            <textarea name="biography" class="form-control ckeditor" rows="6"><?= $val('biography') ?></textarea>
        </div>
    </div>
</div>
