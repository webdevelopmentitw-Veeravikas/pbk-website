<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<p class="text-muted small mb-4">Enter your email address and we'll send you a link to reset your password.</p>

<form action="<?= url('/admin/forgot-password') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="mb-4">
        <label for="email" class="form-label">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= e(old('email')) ?>" required autofocus>
        </div>
        <?php if (isset($errors['email'])): ?><div class="invalid-feedback d-block"><?= e($errors['email']) ?></div><?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">
        <i class="fa-solid fa-paper-plane me-1"></i> Send Reset Link
    </button>

    <div class="text-center">
        <a href="<?= url('/admin/login') ?>" class="text-decoration-none small">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to login
        </a>
    </div>
</form>
