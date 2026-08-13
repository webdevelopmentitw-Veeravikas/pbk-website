<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<form action="<?= url('/admin/login') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= e(old('email')) ?>" required autofocus>
        </div>
        <?php if (isset($errors['email'])): ?><div class="invalid-feedback d-block"><?= e($errors['email'][0] ?? $errors['email']) ?></div><?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" name="password" required>
        </div>
        <?php if (isset($errors['password'])): ?><div class="invalid-feedback d-block"><?= e($errors['password'][0] ?? $errors['password']) ?></div><?php endif; ?>
    </div>

    <div class="mb-4 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
        <label class="form-check-label" for="remember">Remember me</label>
    </div>

    <button type="submit" class="btn btn-primary w-100 mb-3">
        <i class="fa-solid fa-right-to-bracket me-1"></i> Sign In
    </button>

    <div class="text-center">
        <a href="<?= url('/admin/forgot-password') ?>" class="text-decoration-none small">Forgot your password?</a>
    </div>
</form>
