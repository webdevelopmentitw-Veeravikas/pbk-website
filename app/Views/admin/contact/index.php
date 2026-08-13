<div class="page-header">
    <h1><i class="fa-solid fa-envelope me-2 text-primary"></i>Contact Messages</h1>
    <a href="<?= url('/admin/contact-export') ?>" class="btn btn-outline-success">
        <i class="fa-solid fa-file-csv me-1"></i>Export CSV
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Read</th><th>Date</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($messages['data'] ?? [] as $msg): ?>
                    <tr class="<?= !(int) ($msg['is_read'] ?? 0) ? 'table-warning' : '' ?>">
                        <td><?= (int) $msg['id'] ?></td>
                        <td><?= e($msg['name']) ?></td>
                        <td><?= e($msg['email']) ?></td>
                        <td><?= e(str_limit($msg['subject'] ?? '—', 40)) ?></td>
                        <td>
                            <?php if ((int) ($msg['is_read'] ?? 0)): ?>
                                <span class="badge bg-success badge-status">Read</span>
                            <?php else: ?>
                                <span class="badge bg-warning text-dark badge-status">Unread</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted small"><?= format_date($msg['created_at'], 'M j, Y H:i') ?></td>
                        <td>
                            <a href="<?= url('/admin/contact/' . $msg['id']) ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                            <form action="<?= url('/admin/contact/' . $msg['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this message?"><?= csrf_field() ?><button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (($messages['last_page'] ?? 1) > 1): ?>
    <div class="card-footer"><?= paginate_links($messages, $baseUrl) ?></div>
    <?php endif; ?>
</div>
