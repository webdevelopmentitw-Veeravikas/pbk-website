<div class="page-header">
    <h1><i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>Activity Log</h1>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>User</th><th>Action</th><th>Description</th><th>IP</th><th>Date</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($logs['data'] ?? [] as $log): ?>
                    <tr>
                        <td><?= (int) $log['id'] ?></td>
                        <td>
                            <div class="small fw-medium"><?= e($log['user_name'] ?? 'System') ?></div>
                            <?php if (!empty($log['user_email'])): ?><div class="text-muted" style="font-size:0.75rem;"><?= e($log['user_email']) ?></div><?php endif; ?>
                        </td>
                        <td><code class="small"><?= e($log['action']) ?></code></td>
                        <td><?= e(str_limit($log['description'], 80)) ?></td>
                        <td class="small text-muted"><?= e($log['ip_address'] ?? '—') ?></td>
                        <td class="text-muted small"><?= format_date($log['created_at'], 'M j, Y H:i') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (($logs['last_page'] ?? 1) > 1): ?>
    <div class="card-footer"><?= paginate_links($logs, $baseUrl) ?></div>
    <?php endif; ?>
</div>
