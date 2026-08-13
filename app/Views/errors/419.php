<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 — Page Expired</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= asset('assets/css/admin.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="error-page">
        <div>
            <div class="error-code">419</div>
            <h2 class="mb-3">Page Expired</h2>
            <p class="text-muted mb-4">Your session has expired. Please refresh the page and try again.</p>
            <a href="javascript:history.back()" class="btn btn-primary me-2">Go Back</a>
            <a href="<?= url('/admin/login') ?>" class="btn btn-outline-secondary">Login</a>
        </div>
    </div>
</body>
</html>
