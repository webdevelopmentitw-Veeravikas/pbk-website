<div class="page-header">
    <h1><i class="fa-solid fa-bullhorn me-2 text-primary"></i>Announcements</h1>
    <a href="<?= url('/admin/announcements/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Announcement</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="btn-group flex-wrap">
            <a href="<?= url('/admin/announcements') ?>" class="btn btn-<?= empty($type) ? 'primary' : 'outline-secondary' ?>">All</a>
            <?php foreach ($types as $t): ?>
            <a href="<?= url('/admin/announcements?type=' . $t) ?>" class="btn btn-<?= ($type ?? '') === $t ? 'primary' : 'outline-secondary' ?>"><?= ucfirst($t) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>Title</th><th>Type</th><th>Schedule</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($announcements ?? [] as $ann): ?>
                    <tr>
                        <td><?= (int) $ann['id'] ?></td>
                        <td><?= e(str_limit($ann['title'], 50)) ?></td>
                        <td><span class="badge bg-info badge-status"><?= e(ucfirst($ann['type'] ?? '')) ?></span></td>
                        <td class="small text-muted">
                            <?php if (!empty($ann['starts_at'])): ?>From: <?= format_date($ann['starts_at'], 'M j, Y H:i') ?><br><?php endif; ?>
                            <?php if (!empty($ann['ends_at'])): ?>To: <?= format_date($ann['ends_at'], 'M j, Y H:i') ?><?php endif; ?>
                            <?php if (empty($ann['starts_at']) && empty($ann['ends_at'])): ?>—<?php endif; ?>
                        </td>
                        <td><span class="badge bg-<?= (int) ($ann['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status"><?= (int) ($ann['status'] ?? 0) ? 'Active' : 'Inactive' ?></span></td>
                        <td>
                            <a href="<?= url('/admin/announcements/' . $ann['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?= url('/admin/announcements/' . $ann['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this announcement?"><?= csrf_field() ?><button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
