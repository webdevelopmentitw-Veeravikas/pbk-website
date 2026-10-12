<?php
$rows = $members['data'] ?? [];
$filters = $filters ?? [];
?>
<div class="page-header">
    <h1><i class="fa-solid fa-users me-2 text-primary"></i>Organization Members</h1>
    <div class="d-flex gap-2 flex-wrap">
        <a href="<?= url('/admin/organization/members/export') ?>" class="btn btn-outline-success"><i class="fa-solid fa-file-csv me-1"></i>Export CSV</a>
        <a href="<?= url('/admin/organization/members/create') ?>" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Add Member</a>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="q" class="form-control" value="<?= e($filters['q'] ?? '') ?>" placeholder="Name, designation…">
            </div>
            <div class="col-md-3">
                <label class="form-label">Team</label>
                <select name="team_id" class="form-select">
                    <option value="">All Teams</option>
                    <?php foreach ($teams as $t): ?>
                    <option value="<?= (int) $t['id'] ?>" <?= (string) ($filters['team_id'] ?? '') === (string) $t['id'] ? 'selected' : '' ?>><?= e($t['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">District</label>
                <select name="district" class="form-select">
                    <option value="">All</option>
                    <?php foreach ($districts as $d): ?>
                    <option value="<?= e($d) ?>" <?= ($filters['district'] ?? '') === $d ? 'selected' : '' ?>><?= e($d) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="" <?= ($filters['status'] ?? '') === '' ? 'selected' : '' ?>>All</option>
                    <option value="1" <?= (string) ($filters['status'] ?? '') === '1' ? 'selected' : '' ?>>Enabled</option>
                    <option value="0" <?= (string) ($filters['status'] ?? '') === '0' ? 'selected' : '' ?>>Disabled</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-filter me-1"></i>Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form action="<?= url('/admin/organization/members/import') ?>" method="POST" enctype="multipart/form-data" class="row g-2 align-items-end">
            <?= csrf_field() ?>
            <div class="col-md-8">
                <label class="form-label">Bulk Import (CSV)</label>
                <input type="file" name="csv_file" class="form-control" accept=".csv,text/csv" required>
                <div class="form-text">Columns: team, name, tamil_name, english_name, designation, position, assembly, parliament, district, address, state, zone, phone, email, featured, status, joining_date</div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-primary w-100"><i class="fa-solid fa-file-import me-1"></i>Import</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="d-flex gap-2 align-items-center">
            <input type="checkbox" id="selectAllMembers" class="form-check-input">
            <select id="bulkAction" class="form-select form-select-sm" style="width:auto;">
                <option value="">Bulk action…</option>
                <option value="enable">Enable</option>
                <option value="disable">Disable</option>
                <option value="delete">Delete</option>
            </select>
            <button type="button" class="btn btn-sm btn-outline-primary" id="applyBulk">Apply</button>
        </div>
        <span class="text-muted small"><?= (int) ($members['total'] ?? 0) ?> total</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th width="30"></th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Team</th>
                        <th>Designation</th>
                        <th>District</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th width="140">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rows)): ?>
                        <tr><td colspan="9" class="text-center text-muted py-4">No members found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($rows as $m): ?>
                        <tr data-delete-row data-id="<?= (int) $m['id'] ?>">
                            <td><input type="checkbox" class="form-check-input member-check" value="<?= (int) $m['id'] ?>"></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <?php if (!empty($m['photo'])): ?>
                                        <img src="<?= upload_url($m['photo']) ?>" alt="" class="rounded" width="40" height="40" style="object-fit:cover;">
                                    <?php else: ?>
                                        <span class="rounded bg-secondary text-white d-inline-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="fa-solid fa-user"></i></span>
                                    <?php endif; ?>
                                    <form action="<?= url('/admin/organization/members/' . (int) $m['id'] . '/photo') ?>" method="POST" enctype="multipart/form-data" class="mb-0">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="return_to" value="<?= e('/admin/organization/members' . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : '')) ?>">
                                        <label class="btn btn-sm btn-outline-secondary mb-0" title="Upload photo">
                                            <i class="fa-solid fa-camera"></i>
                                            <input type="file" name="photo" accept="image/jpeg,image/png,image/webp,image/gif" hidden onchange="this.form.submit()">
                                        </label>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <strong><?= e($m['tamil_name'] ?: $m['name']) ?></strong>
                                <?php if ((int) ($m['featured'] ?? 0)): ?><span class="badge bg-warning text-dark ms-1">Featured</span><?php endif; ?>
                                <?php if (!empty($m['english_name'])): ?><div class="small text-muted"><?= e($m['english_name']) ?></div><?php endif; ?>
                            </td>
                            <td><?= e($m['team_name'] ?? '') ?></td>
                            <td><?= e($m['designation'] ?? '') ?></td>
                            <td><?= e($m['district'] ?? '') ?></td>
                            <td><?= (int) ($m['sort_order'] ?? 0) ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-toggle-status <?= (int) $m['status'] ? 'btn-success' : 'btn-secondary' ?>"
                                        data-toggle-url="<?= url('/admin/organization/members/' . $m['id'] . '/toggle') ?>">
                                    <?= (int) $m['status'] ? 'On' : 'Off' ?>
                                </button>
                            </td>
                            <td>
                                <a href="<?= url('/organization/member/' . $m['id']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                                <a href="<?= url('/admin/organization/members/' . $m['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-ajax-delete="<?= url('/admin/organization/members/' . $m['id'] . '/delete') ?>" data-confirm="Delete this member?"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (($members['last_page'] ?? 1) > 1): ?>
    <div class="card-footer">
        <?= paginate_links($members, url('/admin/organization/members?' . http_build_query(array_filter($filters)))) ?>
    </div>
    <?php endif; ?>
</div>

<?php
use App\Core\View;
View::startSection('scripts');
?>
<script>
$(function () {
    $('#selectAllMembers').on('change', function () {
        $('.member-check').prop('checked', this.checked);
    });

    $(document).on('click', '.btn-toggle-status', function () {
        const $btn = $(this);
        $.post($btn.data('toggle-url'), { _csrf_token: $('meta[name="csrf-token"]').attr('content') })
            .done(function (res) {
                if (!res.success) return;
                const on = parseInt(res.status, 10) === 1;
                $btn.toggleClass('btn-success', on).toggleClass('btn-secondary', !on).text(on ? 'On' : 'Off');
            });
    });

    $('#applyBulk').on('click', function () {
        const action = $('#bulkAction').val();
        const ids = $('.member-check:checked').map(function () { return $(this).val(); }).get();
        if (!action || !ids.length) {
            alert('Select members and an action.');
            return;
        }
        if (action === 'delete' && !confirm('Delete selected members?')) return;

        $.post('<?= url('/admin/organization/members/bulk') ?>', {
            _csrf_token: $('meta[name="csrf-token"]').attr('content'),
            action: action,
            ids: ids
        }).done(function (res) {
            if (res.success) location.reload();
            else alert(res.message || 'Failed');
        });
    });

    $('[data-preview]').on('change', function () {
        const input = this;
        const $img = $($(input).data('preview'));
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $img.attr('src', e.target.result).removeClass('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
});
</script>
<?php View::endSection(); ?>
