<?php $errors = \App\Core\Session::flash('errors') ?? []; ?>
<div class="page-header">
    <h1><i class="fa-solid fa-user-plus me-2 text-primary"></i>Add Member</h1>
    <a href="<?= url('/admin/organization/members') ?>" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
</div>

<form action="<?= url('/admin/organization/members') ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <?php include __DIR__ . '/_form.php'; ?>
    <button type="submit" class="btn btn-primary mt-3"><i class="fa-solid fa-save me-1"></i>Create Member</button>
</form>

<?php
use App\Core\View;
View::startSection('scripts');
?>
<script>
$(function () {
    $('[data-preview]').on('change', function () {
        const input = this;
        const $img = $($(input).data('preview'));
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => $img.attr('src', e.target.result).removeClass('d-none');
            reader.readAsDataURL(input.files[0]);
        }
    });
});
</script>
<?php View::endSection(); ?>
