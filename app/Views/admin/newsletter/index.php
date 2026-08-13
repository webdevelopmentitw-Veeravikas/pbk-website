<div class="page-header">
    <h1><i class="fa-solid fa-paper-plane me-2 text-primary"></i>Newsletter Subscribers</h1>
    <a href="<?= url('/admin/newsletter-export') ?>" class="btn btn-outline-success">
        <i class="fa-solid fa-file-csv me-1"></i>Export CSV
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>Email</th><th>Name</th><th>Subscribed At</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($subscribers['data'] ?? [] as $sub): ?>
                    <tr>
                        <td><?= (int) $sub['id'] ?></td>
                        <td><?= e($sub['email']) ?></td>
                        <td><?= e($sub['name'] ?? '—') ?></td>
                        <td class="text-muted small"><?= format_date($sub['subscribed_at'] ?? $sub['created_at'] ?? '', 'M j, Y H:i') ?></td>
                        <td>
                            <form action="<?= url('/admin/newsletter/' . $sub['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Remove this subscriber?">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (($subscribers['last_page'] ?? 1) > 1): ?>
    <div class="card-footer"><?= paginate_links($subscribers, $baseUrl) ?></div>
    <?php endif; ?>
</div>
