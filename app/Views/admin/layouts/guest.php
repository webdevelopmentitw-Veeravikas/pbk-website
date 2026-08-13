<?php
use App\Core\Session;
use App\Core\View;

$alert = Session::flash('alert');
$siteName = setting('site_name', config('app.name', 'CMS Portal'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= e(csrf_token()) ?>">
    <meta name="app-url" content="<?= e(config('app.url', '')) ?>">
    <title><?= e($siteName) ?> — Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="<?= asset('assets/css/admin.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="guest-wrapper">
        <div class="card guest-card">
            <div class="card-header">
                <div class="mb-2">
                    <i class="fa-solid fa-layer-group fa-2x text-primary"></i>
                </div>
                <h4 class="mb-0"><?= e($siteName) ?></h4>
                <p class="text-muted small mb-0">Admin Panel</p>
            </div>
            <div class="card-body">
                <?php if ($alert): ?>
                    <div class="alert alert-<?= e($alert['type'] ?? 'info') ?> alert-dismissible fade show" role="alert">
                        <?= e($alert['message'] ?? '') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?= $content ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset('assets/js/admin.js') ?>"></script>
    <?= View::yield('scripts') ?>
</body>
</html>
