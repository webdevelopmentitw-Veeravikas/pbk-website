<?php
$item = $user ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
$isEdit = !empty($item['id']);
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= $val('name') ?>" required>
            <?php if (isset($errors['name'])): ?><div class="invalid-feedback"><?= e($errors['name']) ?></div><?php endif; ?>
        </div>
        <div class="col-md-6">
            <label class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= $val('email') ?>" required>
            <?php if (isset($errors['email'])): ?><div class="invalid-feedback"><?= e($errors['email']) ?></div><?php endif; ?>
        </div>
        <div class="col-md-6">
            <label class="form-label">Password <?= !$isEdit ? '<span class="text-danger">*</span>' : '<span class="text-muted small">(leave blank to keep)</span>' ?></label>
            <input type="password" name="password" class="form-control" <?= !$isEdit ? 'required minlength="8"' : 'minlength="8"' ?>>
        </div>
        <div class="col-md-6">
            <label class="form-label">Confirm Password <?= !$isEdit ? '<span class="text-danger">*</span>' : '' ?></label>
            <input type="password" name="password_confirmation" class="form-control" <?= !$isEdit ? 'required' : '' ?>>
        </div>
        <div class="col-md-4">
            <label class="form-label">Role <span class="text-danger">*</span></label>
            <select name="role_id" class="form-select" required>
                <?php foreach ($roles as $role): ?>
                <option value="<?= (int) $role['id'] ?>" <?= (string) old('role_id', $item['role_id'] ?? '') === (string) $role['id'] ? 'selected' : '' ?>><?= e($role['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= $val('phone') ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="userStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="userStatus">Active</label>
            </div>
        </div>
        <div class="col-12">
            <label class="form-label">Bio</label>
            <textarea name="bio" class="form-control" rows="3"><?= $val('bio') ?></textarea>
        </div>
        <div class="col-md-6">
            <label class="form-label">Avatar</label>
            <?php if (!empty($item['avatar'])): ?>
                <div class="mb-2"><img src="<?= upload_url($item['avatar']) ?>" class="image-preview rounded-circle" alt="" style="width:80px;height:80px;object-fit:cover;"></div>
            <?php endif; ?>
            <input type="file" name="avatar" class="form-control" accept="image/*">
        </div>
    </div>
</div>
