<div class="page-header">
    <h1><i class="fa-solid fa-folder-tree me-2 text-primary"></i>Categories</h1>
    <a href="<?= url('/admin/categories/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Category</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Sort</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($categories)): ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">No categories found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><?= (int) $cat['id'] ?></td>
                            <td>
                                <?php if (!empty($cat['image'])): ?>
                                    <img src="<?= upload_url($cat['image']) ?>" alt="" class="rounded me-2" width="32" height="32" style="object-fit:cover;">
                                <?php endif; ?>
                                <?= e($cat['name']) ?>
                            </td>
                            <td><code class="small"><?= e($cat['slug']) ?></code></td>
                            <td><?= (int) ($cat['sort_order'] ?? 0) ?></td>
                            <td>
                                <span class="badge bg-<?= (int) ($cat['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status">
                                    <?= (int) ($cat['status'] ?? 0) ? 'Active' : 'Inactive' ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= url('/admin/categories/' . $cat['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <form action="<?= url('/admin/categories/' . $cat['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this category?">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
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
