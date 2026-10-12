<div class="page-header">
    <h1><i class="fa-solid fa-file-lines me-2 text-primary"></i>Pages</h1>
    <a href="<?= url('/admin/pages/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Page</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Template</th>
                        <th>Header menu</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pages ?? [] as $page): ?>
                    <tr>
                        <td><?= (int) $page['id'] ?></td>
                        <td><?= e($page['title']) ?></td>
                        <td><code class="small"><?= e($page['slug']) ?></code></td>
                        <td><?= e($page['template'] ?? 'default') ?></td>
                        <td>
                            <?php if ((int) ($page['show_in_menu'] ?? 0) === 1): ?>
                                <span class="badge bg-primary">Selected</span>
                            <?php else: ?>
                                <span class="badge bg-light text-dark">No</span>
                            <?php endif; ?>
                        </td>
                        <td><span class="badge bg-<?= (int) ($page['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status"><?= (int) ($page['status'] ?? 0) ? 'Active' : 'Inactive' ?></span></td>
                        <td>
                            <a href="<?= url('/admin/pages/' . $page['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?= url('/admin/pages/' . $page['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this page?">
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
</div>
