<div class="page-header">
    <h1><i class="fa-solid fa-newspaper me-2 text-primary"></i>Posts</h1>
    <a href="<?= url('/admin/posts/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>New Post</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts['data'] ?? [] as $post): ?>
                    <tr>
                        <td><?= (int) $post['id'] ?></td>
                        <td>
                            <?php if (!empty($post['featured_image'])): ?>
                                <img src="<?= upload_url($post['featured_image']) ?>" alt="" class="rounded me-2" width="40" height="30" style="object-fit:cover;">
                            <?php endif; ?>
                            <?= e(str_limit($post['title'], 60)) ?>
                        </td>
                        <td><span class="badge bg-<?= ($post['status'] ?? '') === 'published' ? 'success' : (($post['status'] ?? '') === 'draft' ? 'secondary' : 'warning') ?> badge-status"><?= e(ucfirst($post['status'] ?? '')) ?></span></td>
                        <td><?= (int) ($post['is_featured'] ?? 0) ? '<i class="fa-solid fa-star text-warning"></i>' : '—' ?></td>
                        <td class="text-muted small"><?= format_date($post['created_at']) ?></td>
                        <td>
                            <a href="<?= url('/admin/posts/' . $post['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="<?= url('/admin/posts/' . $post['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this post?">
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
    <?php if (($posts['last_page'] ?? 1) > 1): ?>
    <div class="card-footer"><?= paginate_links($posts, $baseUrl) ?></div>
    <?php endif; ?>
</div>
