<div class="page-header">
    <h1><i class="fa-solid fa-video me-2 text-primary"></i>Videos</h1>
    <a href="<?= url('/admin/videos/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Video</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr><th>ID</th><th>Thumbnail</th><th>Title</th><th>YouTube</th><th>Status</th><th>Actions</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($videos ?? [] as $video): ?>
                    <tr>
                        <td><?= (int) $video['id'] ?></td>
                        <td><?php if (!empty($video['thumbnail'])): ?><img src="<?= upload_url($video['thumbnail']) ?>" width="60" height="40" class="rounded" style="object-fit:cover;"><?php else: ?>—<?php endif; ?></td>
                        <td><?= e(str_limit($video['title'], 50)) ?></td>
                        <td class="small"><a href="<?= e($video['youtube_url']) ?>" target="_blank"><?= e(str_limit($video['youtube_url'], 40)) ?></a></td>
                        <td><span class="badge bg-<?= (int) ($video['status'] ?? 0) ? 'success' : 'secondary' ?> badge-status"><?= (int) ($video['status'] ?? 0) ? 'Active' : 'Inactive' ?></span></td>
                        <td>
                            <a href="<?= url('/admin/videos/' . $video['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?= url('/admin/videos/' . $video['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this video?"><?= csrf_field() ?><button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button></form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
