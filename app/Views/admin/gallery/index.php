<div class="page-header">
    <h1><i class="fa-solid fa-photo-film me-2 text-primary"></i>Gallery</h1>
    <a href="<?= url('/admin/gallery/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Album</a>
</div>

<div class="row g-4">
    <?php if (empty($galleries)): ?>
        <div class="col-12"><div class="card"><div class="card-body text-center text-muted py-5">No gallery albums yet.</div></div></div>
    <?php else: ?>
        <?php foreach ($galleries as $gallery): ?>
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <?php if (!empty($gallery['cover_image'])): ?>
                    <img src="<?= upload_url($gallery['cover_image']) ?>" class="card-img-top" alt="" style="height:180px;object-fit:cover;">
                <?php else: ?>
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height:180px;"><i class="fa-solid fa-image fa-3x text-muted"></i></div>
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= e($gallery['title']) ?></h5>
                    <p class="card-text small text-muted"><?= e(str_limit($gallery['description'] ?? '', 80)) ?></p>
                    <span class="badge bg-<?= (int) ($gallery['status'] ?? 0) ? 'success' : 'secondary' ?>"><?= (int) ($gallery['status'] ?? 0) ? 'Active' : 'Inactive' ?></span>
                </div>
                <div class="card-footer bg-transparent d-flex gap-2">
                    <a href="<?= url('/admin/gallery/' . $gallery['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary flex-fill"><i class="fa-solid fa-pen me-1"></i>Edit</a>
                    <form action="<?= url('/admin/gallery/' . $gallery['id'] . '/delete') ?>" method="POST" data-confirm="Delete this gallery album?">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
