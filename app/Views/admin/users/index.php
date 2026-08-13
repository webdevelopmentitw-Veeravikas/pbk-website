<div class="page-header">
    <h1><i class="fa-solid fa-users me-2 text-primary"></i>Users</h1>
    <a href="<?= url('/admin/users/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add User</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>User</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($users ?? [] as $u): ?>
                    <tr>
                        <td><?= (int) $u['id'] ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <?php if (!empty($u['avatar'])): ?>
                                    <img src="<?= upload_url($u['avatar']) ?>" class="rounded-circle" width="32" height="32" style="object-fit:cover;">
                                <?php else: ?>
                                    <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center" style="width:32px;height:32px;font-size:12px;"><?= e(strtoupper(substr($u['name'], 0, 1))) ?></span>
                                <?php endif; ?>
                                <?= e($u['name']) ?>
                            </div>
                        </td>
                        <td><?= e($u['email']) ?></td>
                        <td><span class="badge bg-info badge-status"><?= e($u['role_name'] ?? '—') ?></span></td>
                        <td><span class="badge bg-<?= (int) ($u['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status"><?= (int) ($u['status'] ?? 0) ? 'Active' : 'Inactive' ?></span></td>
                        <td>
                            <a href="<?= url('/admin/users/' . $u['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?= url('/admin/users/' . $u['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this user?"><?= csrf_field() ?><button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
