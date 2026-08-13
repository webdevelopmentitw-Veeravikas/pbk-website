<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<p class="text-muted small mb-4">Enter your new password below.</p>

<form action="<?= url('/admin/reset-password') ?>" method="POST">
    <?= csrf_field() ?>
    <input type="hidden" name="token" value="<?= e($token) ?>">

    <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" name="password" required minlength="8">
        </div>
        <?php if (isset($errors['password'])): ?><div class="invalid-feedback d-block"><?= e($errors['password'][0] ?? $errors['password']) ?></div><?php endif; ?>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            <input type="password" class="form-control <?= isset($errors['password_confirmation']) ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation" required minlength="8">
        </div>
        <?php if (isset($errors['password_confirmation'])): ?><div class="invalid-feedback d-block"><?= e($errors['password_confirmation'][0] ?? $errors['password_confirmation']) ?></div><?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">
        <i class="fa-solid fa-check me-1"></i> Reset Password
    </button>

    <div class="text-center">
        <a href="<?= url('/admin/login') ?>" class="text-decoration-none small">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to login
        </a>
    </div>
</form>
