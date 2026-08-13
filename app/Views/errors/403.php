<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 — Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= asset('assets/css/admin.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="error-page">
        <div>
            <div class="error-code">403</div>
            <h2 class="mb-3">Access Forbidden</h2>
            <p class="text-muted mb-4">You do not have permission to access this resource.</p>
            <a href="<?= url('/') ?>" class="btn btn-primary me-2">Go Home</a>
            <a href="<?= url('/admin') ?>" class="btn btn-outline-secondary">Admin Panel</a>
        </div>
    </div>
</body>
</html>
