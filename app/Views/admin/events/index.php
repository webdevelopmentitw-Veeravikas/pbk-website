<div class="page-header">
    <h1><i class="fa-solid fa-calendar-days me-2 text-primary"></i>Events</h1>
    <a href="<?= url('/admin/events/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Event</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>Title</th><th>Date</th><th>Location</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($events ?? [] as $event): ?>
                    <tr>
                        <td><?= (int) $event['id'] ?></td>
                        <td><?= e(str_limit($event['title'], 50)) ?></td>
                        <td><?= format_date($event['event_date'] ?? '') ?><?php if (!empty($event['event_time'])): ?> <?= e($event['event_time']) ?><?php endif; ?></td>
                        <td><?= e(str_limit($event['location'] ?? '—', 30)) ?></td>
                        <td><span class="badge bg-<?= (int) ($event['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status"><?= (int) ($event['status'] ?? 0) ? 'Active' : 'Inactive' ?></span></td>
                        <td>
                            <a href="<?= url('/admin/events/' . $event['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?= url('/admin/events/' . $event['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this event?"><?= csrf_field() ?><button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
