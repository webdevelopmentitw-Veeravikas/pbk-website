<div class="page-header">
    <h1><i class="fa-solid fa-bars me-2 text-primary"></i>Menus</h1>
    <div class="d-flex gap-2">
        <a href="<?= url('/admin/menus/create') ?>" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i>Add Menu Item
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">Filter by Location</label>
                <select name="location" class="form-select" onchange="this.form.submit()">
                    <option value="">All Locations</option>
                    <?php foreach (['header', 'footer', 'sidebar'] as $loc): ?>
                    <option value="<?= $loc ?>" <?= ($location ?? '') === $loc ? 'selected' : '' ?>><?= ucfirst($loc) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="fa-solid fa-file-lines me-2"></i>Pages list (select for header menu)</span>
        <a href="<?= url('/admin/pages') ?>" class="btn btn-sm btn-outline-secondary">Manage pages</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Page</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Header menu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pages)): ?>
                    <tr><td colspan="5" class="text-center text-muted py-4">No pages found.</td></tr>
                    <?php else: ?>
                    <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= e($page['title'] ?? '') ?></td>
                        <td><code class="small">/page/<?= e($page['slug'] ?? '') ?></code></td>
                        <td>
                            <span class="badge bg-<?= (int) ($page['status'] ?? 0) ? 'success' : 'secondary' ?>">
                                <?= (int) ($page['status'] ?? 0) ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                        <td>
                            <?php if ((int) ($page['show_in_menu'] ?? 0) === 1): ?>
                                <span class="badge bg-primary">Selected</span>
                            <?php else: ?>
                                <span class="badge bg-light text-dark">Not selected</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end">
                            <form action="<?= url('/admin/menus/toggle-page/' . (int) $page['id']) ?>" method="POST" class="d-inline">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-outline-<?= (int) ($page['show_in_menu'] ?? 0) ? 'secondary' : 'primary' ?>">
                                    <?= (int) ($page['show_in_menu'] ?? 0) ? 'Remove from header' : 'Add to header' ?>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header"><i class="fa-solid fa-list me-2"></i>Menu Items</div>
    <div class="card-body">
        <div id="menuSortable">
            <?php
            $renderMenu = function ($items, $level = 0) use (&$renderMenu) {
                foreach ($items as $item):
            ?>
            <div class="menu-tree-item" data-id="<?= (int) $item['id'] ?>" style="margin-left: <?= $level * 20 ?>px;">
                <i class="fa-solid fa-grip-vertical handle"></i>
                <?php if (!empty($item['icon'])): ?><i class="fa-solid fa-<?= e($item['icon']) ?> me-1 text-muted"></i><?php endif; ?>
                <strong><?= e($item['title']) ?></strong>
                <span class="badge bg-light text-dark ms-2"><?= e($item['location']) ?></span>
                <?php if (!(int) ($item['status'] ?? 0)): ?><span class="badge bg-secondary ms-1">Inactive</span><?php endif; ?>
                <?php if (str_starts_with((string) ($item['url'] ?? ''), '/page/')): ?>
                    <span class="badge bg-info text-dark ms-1">Page</span>
                <?php endif; ?>
                <span class="text-muted small ms-2"><?= e($item['url'] ?? '') ?></span>
                <div class="float-end">
                    <a href="<?= url('/admin/menus/' . $item['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                    <form action="<?= url('/admin/menus/' . $item['id'] . '/delete') ?>" method="POST" class="d-inline" data-confirm="Delete this menu item?">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
            <?php
                if (!empty($item['children'])) {
                    $renderMenu($item['children'], $level + 1);
                }
                endforeach;
            };
            if (!empty($tree)) {
                $renderMenu($tree);
            } else {
                echo '<p class="text-muted text-center py-4">No menu items found.</p>';
            }
            ?>
        </div>
        <?php if (!empty($menus)): ?>
        <button type="button" id="saveMenuOrder" class="btn btn-success mt-3">
            <i class="fa-solid fa-save me-1"></i>Save Order
        </button>
        <?php endif; ?>
    </div>
</div>

<?php \App\Core\View::startSection('scripts'); ?>
<script>
$('#saveMenuOrder').on('click', function () {
    const order = [];
    $('#menuSortable .menu-tree-item').each(function () { order.push($(this).data('id')); });
    $.post('<?= url('/admin/menus/reorder') ?>', { order: order, _csrf_token: Admin.csrfToken() })
        .done(function (res) { Admin.showToast(res.message || 'Order saved.', 'success'); })
        .fail(function () { Admin.showToast('Failed to save order.', 'danger'); });
});
</script>
<?php \App\Core\View::endSection(); ?>
