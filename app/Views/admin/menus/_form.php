<?php
$item = $menu ?? [];
$val = fn($key, $default = '') => e(old($key, $item[$key] ?? $default));
?>
<div class="form-section">
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $val('title') ?>" required>
            <?php if (isset($errors['title'])): ?><div class="invalid-feedback"><?= e($errors['title']) ?></div><?php endif; ?>
        </div>
        <div class="col-md-6">
            <label class="form-label">Parent Menu</label>
            <select name="parent_id" class="form-select">
                <option value="">— None (Top Level) —</option>
                <?php foreach ($parents as $p): ?>
                <option value="<?= (int) $p['id'] ?>" <?= (string) old('parent_id', $item['parent_id'] ?? '') === (string) $p['id'] ? 'selected' : '' ?>><?= e($p['title'] ?? $p['name'] ?? '') ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">URL Type <span class="text-danger">*</span></label>
            <select name="url_type" class="form-select" required id="menuUrlType">
                <?php foreach (['internal', 'external'] as $t): ?>
                <option value="<?= $t ?>" <?= old('url_type', $item['url_type'] ?? 'internal') === $t ? 'selected' : '' ?>><?= ucfirst($t) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php
        $currentUrl = (string) old('url', $item['url'] ?? '');
        $pageUrls = [];
        foreach ($pages ?? [] as $pageRow) {
            $slug = trim((string) ($pageRow['slug'] ?? ''), '/');
            if ($slug !== '') {
                $pageUrls['/page/' . $slug] = (string) ($pageRow['title'] ?? $slug);
            }
        }
        $isPageUrl = $currentUrl !== '' && isset($pageUrls[$currentUrl]);
        $linkSource = old('link_source', $isPageUrl ? 'page' : ($currentUrl !== '' ? 'custom' : 'page'));
        ?>
        <div class="col-md-4" id="menuPageWrap">
            <label class="form-label">Page</label>
            <select class="form-select" id="menuPageSelect" autocomplete="off">
                <option value="">— Select a page —</option>
                <?php foreach ($pages ?? [] as $pageRow): ?>
                    <?php
                    $slug = trim((string) ($pageRow['slug'] ?? ''), '/');
                    if ($slug === '') {
                        continue;
                    }
                    $pageUrl = '/page/' . $slug;
                    ?>
                    <option
                        value="<?= e($pageUrl) ?>"
                        data-title="<?= e($pageRow['title'] ?? '') ?>"
                        <?= $currentUrl === $pageUrl ? 'selected' : '' ?>
                    >
                        <?= e($pageRow['title'] ?? $slug) ?> (<?= e($pageUrl) ?>)
                    </option>
                <?php endforeach; ?>
                <option value="__custom__" <?= $linkSource === 'custom' && !$isPageUrl ? 'selected' : '' ?>>Custom / external URL…</option>
            </select>
            <div class="form-text">Choose a page to auto-fill the URL.</div>
        </div>
        <div class="col-md-4" id="menuUrlWrap">
            <label class="form-label">URL</label>
            <input type="text" name="url" id="menuUrlInput" class="form-control" value="<?= e($currentUrl) ?>" placeholder="/page/about or https://..." autocomplete="off">
        </div>
        <div class="col-md-4">
            <label class="form-label">Location <span class="text-danger">*</span></label>
            <select name="location" class="form-select" required>
                <?php foreach (['header', 'footer', 'sidebar'] as $loc): ?>
                <option value="<?= $loc ?>" <?= old('location', $item['location'] ?? 'header') === $loc ? 'selected' : '' ?>><?= ucfirst($loc) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Target <span class="text-danger">*</span></label>
            <select name="target" class="form-select" required>
                <option value="_self" <?= old('target', $item['target'] ?? '_self') === '_self' ? 'selected' : '' ?>>Same Window</option>
                <option value="_blank" <?= old('target', $item['target'] ?? '') === '_blank' ? 'selected' : '' ?>>New Window</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="<?= $val('sort_order', '0') ?>">
        </div>
        <div class="col-md-4">
            <label class="form-label">Icon (Font Awesome)</label>
            <input type="text" name="icon" class="form-control" value="<?= $val('icon') ?>" placeholder="fa-home">
        </div>
        <div class="col-md-4">
            <label class="form-label">Route Name</label>
            <input type="text" name="route_name" class="form-control" value="<?= $val('route_name') ?>">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" name="status" value="1" id="menuStatus" <?= old('status', $item['status'] ?? 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="menuStatus">Active</label>
            </div>
        </div>
    </div>
</div>

<?php \App\Core\View::startSection('scripts'); ?>
<script>
(function () {
    const pageSelect = document.getElementById('menuPageSelect');
    const urlInput = document.getElementById('menuUrlInput');
    const urlType = document.getElementById('menuUrlType');
    const titleInput = document.querySelector('input[name="title"]');
    if (!pageSelect || !urlInput) return;

    function syncFromPage() {
        const value = pageSelect.value;
        if (!value || value === '__custom__') {
            if (value === '__custom__' && urlType) {
                // leave url editable for custom/external
            }
            return;
        }
        urlInput.value = value;
        if (urlType) urlType.value = 'internal';
        const opt = pageSelect.options[pageSelect.selectedIndex];
        const pageTitle = opt ? (opt.getAttribute('data-title') || '') : '';
        if (titleInput && pageTitle && !titleInput.value.trim()) {
            titleInput.value = pageTitle;
        }
    }

    pageSelect.addEventListener('change', function () {
        if (pageSelect.value === '__custom__') {
            urlInput.focus();
            return;
        }
        syncFromPage();
    });

    if (pageSelect.value && pageSelect.value !== '__custom__') {
        syncFromPage();
    }
})();
</script>
<?php \App\Core\View::endSection(); ?>
