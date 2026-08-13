<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<div class="page-header">
    <h1><i class="fa-solid fa-photo-film me-2 text-primary"></i>Create Gallery Album</h1>
    <a href="<?= url('/admin/gallery') ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
</div>

<form action="<?= url('/admin/gallery') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <?php include __DIR__ . '/_form.php'; ?>
    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-save me-1"></i>Create Album</button>
</form>
