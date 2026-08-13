<div class="page-header">
    <h1><i class="fa-solid fa-cloud-arrow-up me-2 text-primary"></i>Media Library</h1>
</div>

<div class="row g-4">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">Folders</div>
            <div class="list-group list-group-flush">
                <a href="<?= url('/admin/media') ?>" class="list-group-item list-group-item-action <?= empty($folder) ? 'active' : '' ?>">
                    <i class="fa-solid fa-folder me-2"></i>All Files
                </a>
                <?php foreach ($folders ?? [] as $f): ?>
                <a href="<?= url('/admin/media?folder=' . urlencode($f)) ?>" class="list-group-item list-group-item-action <?= ($folder ?? '') === $f ? 'active' : '' ?>">
                    <i class="fa-solid fa-folder me-2"></i><?= e($f) ?>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-sm btn-outline-primary w-100" id="createFolderBtn">
                    <i class="fa-solid fa-folder-plus me-1"></i>New Folder
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" class="row g-2">
                    <?php if (!empty($folder)): ?><input type="hidden" name="folder" value="<?= e($folder) ?>"><?php endif; ?>
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Search files..." value="<?= e($q ?? '') ?>">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="media-dropzone mb-4" id="mediaDropzone">
            <i class="fa-solid fa-cloud-arrow-up fa-3x text-muted mb-3"></i>
            <p class="mb-1">Drag & drop files here or click to browse</p>
            <p class="text-muted small mb-0">Uploading to: <strong><?= e($folder ?: 'root') ?></strong></p>
            <input type="file" id="mediaFileInput" multiple class="d-none">
        </div>

        <div class="media-grid" id="mediaGrid">
            <?php if (empty($items)): ?>
                <div class="col-12 text-center text-muted py-5">No media files found.</div>
            <?php else: ?>
                <?php foreach ($items as $item): ?>
                <div class="media-item" data-delete-row data-id="<?= (int) $item['id'] ?>">
                    <?php if (str_starts_with($item['mime_type'] ?? '', 'image/')): ?>
                        <img src="<?= upload_url($item['thumb_path'] ?? $item['path']) ?>" alt="<?= e($item['alt_text'] ?? '') ?>">
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height:120px;">
                            <i class="fa-solid fa-file fa-2x text-muted"></i>
                        </div>
                    <?php endif; ?>
                    <div class="media-item-info">
                        <div class="text-truncate fw-medium" title="<?= e($item['original_name']) ?>"><?= e($item['original_name']) ?></div>
                        <div class="text-muted"><?= e($item['folder'] ?? 'root') ?> · <?= number_format(($item['size'] ?? 0) / 1024, 1) ?> KB</div>
                        <div class="btn-group btn-group-sm w-100 mt-2">
                            <button type="button" class="btn btn-outline-secondary rename-btn" data-id="<?= (int) $item['id'] ?>" data-name="<?= e($item['original_name']) ?>"><i class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-ajax-delete="<?= url('/admin/media/' . $item['id'] . '/delete') ?>"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php \App\Core\View::startSection('scripts'); ?>
<script>
const mediaFolder = <?= json_encode($folder ?: 'root') ?>;

$('#mediaDropzone').on('click', function () { $('#mediaFileInput').click(); });
$('#mediaDropzone').on('dragover', function (e) { e.preventDefault(); $(this).addClass('dragover'); });
$('#mediaDropzone').on('dragleave drop', function (e) { e.preventDefault(); $(this).removeClass('dragover'); });
$('#mediaDropzone').on('drop', function (e) { uploadFiles(e.originalEvent.dataTransfer.files); });
$('#mediaFileInput').on('change', function () { uploadFiles(this.files); });

function uploadFiles(files) {
    if (!files.length) return;
    const fd = new FormData();
    fd.append('folder', mediaFolder);
    fd.append('_csrf_token', Admin.csrfToken());
    for (let i = 0; i < files.length; i++) fd.append('files[]', files[i]);
    $.ajax({ url: '<?= url('/admin/media/upload') ?>', method: 'POST', data: fd, processData: false, contentType: false })
        .done(function (res) { Admin.showToast(res.message || 'Uploaded.', 'success'); setTimeout(function () { location.reload(); }, 800); })
        .fail(function (xhr) { Admin.showToast(xhr.responseJSON?.message || 'Upload failed.', 'danger'); });
}

$('.rename-btn').on('click', function () {
    const id = $(this).data('id');
    const name = prompt('Enter new filename:', $(this).data('name'));
    if (!name) return;
    $.post('<?= url('/admin/media') ?>/' + id + '/rename', { original_name: name, _csrf_token: Admin.csrfToken() })
        .done(function (res) { Admin.showToast(res.message || 'Renamed.', 'success'); location.reload(); })
        .fail(function (xhr) { Admin.showToast(xhr.responseJSON?.message || 'Rename failed.', 'danger'); });
});

$('#createFolderBtn').on('click', function () {
    const name = prompt('Enter folder name:');
    if (!name) return;
    $.post('<?= url('/admin/media/folders') ?>', { name: name, _csrf_token: Admin.csrfToken() })
        .done(function (res) { Admin.showToast(res.message || 'Folder created.', 'success'); location.reload(); })
        .fail(function (xhr) { Admin.showToast(xhr.responseJSON?.message || 'Failed.', 'danger'); });
});
</script>
<?php \App\Core\View::endSection(); ?>
