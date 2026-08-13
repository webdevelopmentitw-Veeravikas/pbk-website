<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<div class="page-header">
    <h1><i class="fa-solid fa-photo-film me-2 text-primary"></i>Edit Gallery Album</h1>
    <a href="<?= url('/admin/gallery') ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
</div>

<form action="<?= url('/admin/gallery/' . $gallery['id']) ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <?php include __DIR__ . '/_form.php'; ?>
    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-save me-1"></i>Update Album</button>
</form>

<div class="form-section mt-4">
    <h5 class="mb-3"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload More Images</h5>
    <form action="<?= url('/admin/gallery/' . $gallery['id'] . '/images') ?>" method="POST" enctype="multipart/form-data" id="galleryUploadForm">
        <?= csrf_field() ?>
        <input type="file" name="images[]" class="form-control mb-3" accept="image/*" multiple required>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-upload me-1"></i>Upload Images</button>
    </form>
</div>

<?php if (!empty($gallery['images'])): ?>
<div class="form-section mt-4">
    <h5 class="mb-3">Album Images (<?= count($gallery['images']) ?>)</h5>
    <div class="gallery-images-grid">
        <?php foreach ($gallery['images'] as $img): ?>
        <div class="gallery-image-item" data-delete-row>
            <img src="<?= upload_url($img['image_path']) ?>" alt="">
            <button type="button" class="btn btn-danger btn-sm btn-delete" data-ajax-delete="<?= url('/admin/gallery/images/' . $img['id'] . '/delete') ?>" data-confirm="Delete this image?">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
