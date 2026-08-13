<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<div class="page-header">
    <h1><i class="fa-solid fa-bars me-2 text-primary"></i>Create Menu Item</h1>
    <a href="<?= url('/admin/menus') ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
</div>

<form action="<?= url('/admin/menus') ?>" method="POST">
    <?= csrf_field() ?>
    <?php include __DIR__ . '/_form.php'; ?>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save me-1"></i>Create Menu Item</button>
    </div>
</form>
