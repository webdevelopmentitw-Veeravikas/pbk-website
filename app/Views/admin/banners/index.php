<div class="page-header">
    <h1><i class="fa-solid fa-images me-2 text-primary"></i>Banners</h1>
    <a href="<?= url('/admin/banners/create?type=' . urlencode($type ?? 'slider')) ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Banner</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="btn-group flex-wrap">
            <?php foreach ($types as $t): ?>
            <a href="<?= url('/admin/banners?type=' . $t) ?>" class="btn btn-<?= ($type ?? 'slider') === $t ? 'primary' : 'outline-secondary' ?>"><?= ucfirst($t) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Sort</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($banners)): ?>
                        <tr><td colspan="6" class="text-center text-muted py-4">No banners found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($banners as $banner): ?>
                        <tr>
                            <td><img src="<?= upload_url($banner['image']) ?>" alt="" class="rounded" width="80" height="45" style="object-fit:cover;"></td>
                            <td><?= e($banner['title']) ?><?php if (!empty($banner['subtitle'])): ?><br><small class="text-muted"><?= e($banner['subtitle']) ?></small><?php endif; ?></td>
                            <td class="small"><?= e(str_limit($banner['link'] ?? '—', 40)) ?></td>
                            <td><?= (int) ($banner['sort_order'] ?? 0) ?></td>
                            <td><span class="badge bg-<?= (int) ($banner['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status"><?= (int) ($banner['status'] ?? 0) ? 'Active' : 'Inactive' ?></span></td>
                            <td>
                                <a href="<?= url('/admin/banners/' . $banner['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <form action="<?= url('/admin/banners/' . $banner['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this banner?">
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
