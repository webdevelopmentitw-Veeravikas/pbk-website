<div class="page-header">
    <h1><i class="fa-solid fa-database me-2 text-primary"></i>Database Backup</h1>
    <form action="<?= url('/admin/backup/create') ?>" method="POST" class="d-inline">
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-primary" data-confirm="Create a new database backup?">
            <i class="fa-solid fa-plus me-1"></i>Create Backup
        </button>
    </form>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card stat-card h-100">
            <div class="card-body">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary mb-3"><i class="fa-solid fa-database"></i></div>
                <div class="stat-value"><?= count($backups ?? []) ?></div>
                <div class="stat-label">Total Backups</div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="alert alert-warning mb-0">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>
            <strong>Warning:</strong> Restoring a backup will overwrite all current database data. Make sure to create a fresh backup before restoring.
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="fa-solid fa-list me-2"></i>Available Backups</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr><th>Filename</th><th>Size</th><th>Date</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php if (empty($backups)): ?>
                        <tr><td colspan="4" class="text-center text-muted py-4">No backups found. Create your first backup above.</td></tr>
                    <?php else: ?>
                        <?php foreach ($backups as $backup): ?>
                        <tr>
                            <td><code><?= e($backup['name']) ?></code></td>
                            <td><?= number_format(($backup['size'] ?? 0) / 1024, 1) ?> KB</td>
                            <td><?= e($backup['date']) ?></td>
                            <td>
                                <a href="<?= url('/admin/backup/download/' . urlencode($backup['name'])) ?>" class="btn btn-sm btn-outline-success">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                                <form action="<?= url('/admin/backup/restore') ?>" method="POST" class="d-inline" data-confirm="WARNING: This will overwrite ALL database data with this backup. Are you absolutely sure?">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="file" value="<?= e($backup['name']) ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-rotate-left"></i> Restore</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
