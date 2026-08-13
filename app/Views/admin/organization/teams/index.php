<div class="page-header">
    <h1><i class="fa-solid fa-sitemap me-2 text-primary"></i>Organization Teams</h1>
    <a href="<?= url('/admin/organization/teams/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Team</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 datatable" id="orgTeamsTable">
                <thead>
                    <tr>
                        <th width="40">#</th>
                        <th>Team</th>
                        <th>Slug</th>
                        <th>Members</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody id="orgTeamsBody">
                    <?php if (empty($teams)): ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">No teams yet. Create your first team.</td></tr>
                    <?php else: ?>
                        <?php foreach ($teams as $team): ?>
                        <tr data-delete-row data-id="<?= (int) $team['id'] ?>">
                            <td><?= (int) $team['id'] ?></td>
                            <td>
                                <?php if (!empty($team['image'])): ?>
                                    <img src="<?= upload_url($team['image']) ?>" alt="" class="rounded me-2" width="36" height="36" style="object-fit:cover;">
                                <?php endif; ?>
                                <strong><?= e($team['name']) ?></strong>
                            </td>
                            <td><code class="small"><?= e($team['slug']) ?></code></td>
                            <td>
                                <a href="<?= url('/admin/organization/members?team_id=' . (int) $team['id']) ?>">
                                    <?= (int) ($team['member_count'] ?? 0) ?>
                                </a>
                            </td>
                            <td><?= (int) ($team['sort_order'] ?? 0) ?></td>
                            <td>
                                <button type="button" class="btn btn-sm badge-status btn-toggle-status <?= (int) $team['status'] ? 'btn-success' : 'btn-secondary' ?>"
                                        data-toggle-url="<?= url('/admin/organization/teams/' . $team['id'] . '/toggle') ?>">
                                    <?= (int) $team['status'] ? 'Enabled' : 'Disabled' ?>
                                </button>
                            </td>
                            <td>
                                <a href="<?= url('/organization/' . $team['slug']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary" title="View"><i class="fa-solid fa-eye"></i></a>
                                <a href="<?= url('/admin/organization/teams/' . $team['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-ajax-delete="<?= url('/admin/organization/teams/' . $team['id'] . '/delete') ?>" data-confirm="Delete this team and all members?"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
use App\Core\View;
View::startSection('scripts');
?>
<script>
$(function () {
    $(document).on('click', '.btn-toggle-status', function () {
        const $btn = $(this);
        $.post($btn.data('toggle-url'), { _csrf_token: $('meta[name="csrf-token"]').attr('content') })
            .done(function (res) {
                if (!res.success) return;
                const on = parseInt(res.status, 10) === 1;
                $btn.toggleClass('btn-success', on).toggleClass('btn-secondary', !on).text(on ? 'Enabled' : 'Disabled');
            });
    });
});
</script>
<?php View::endSection(); ?>
