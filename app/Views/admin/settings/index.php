<div class="page-header">
    <h1><i class="fa-solid fa-gear me-2 text-primary"></i>Settings</h1>
</div>

<form action="<?= url('/admin/settings') ?>" method="POST">
    <?= csrf_field() ?>

    <?php
    $groupLabels = [
        'general' => ['icon' => 'fa-globe', 'title' => 'General Settings'],
        'social'  => ['icon' => 'fa-share-nodes', 'title' => 'Social Media'],
        'smtp'    => ['icon' => 'fa-envelope', 'title' => 'SMTP / Email'],
        'seo'     => ['icon' => 'fa-magnifying-glass', 'title' => 'SEO Settings'],
    ];
    $groupOrder = ['general', 'social', 'smtp', 'seo'];
    ?>

    <?php foreach ($groupOrder as $groupKey): ?>
        <?php if (empty($settings[$groupKey])) continue; ?>
        <div class="form-section">
            <h5 class="mb-3">
                <i class="fa-solid <?= e($groupLabels[$groupKey]['icon'] ?? 'fa-cog') ?> me-2"></i>
                <?= e($groupLabels[$groupKey]['title'] ?? ucfirst($groupKey)) ?>
            </h5>
            <div class="row g-3">
                <?php foreach ($settings[$groupKey] as $key => $row): ?>
                <div class="col-md-6">
                    <label class="form-label"><?= e(ucwords(str_replace('_', ' ', $key))) ?></label>
                    <?php if (($row['type'] ?? 'text') === 'textarea' || in_array($key, ['site_description', 'robots_txt', 'footer_text'], true)): ?>
                        <textarea name="settings[<?= e($key) ?>]" class="form-control" rows="3"><?= e($row['value'] ?? '') ?></textarea>
                    <?php elseif (($row['type'] ?? '') === 'boolean' || str_starts_with($key, 'enable_')): ?>
                        <select name="settings[<?= e($key) ?>]" class="form-select">
                            <option value="1" <?= ($row['value'] ?? '') == '1' ? 'selected' : '' ?>>Yes</option>
                            <option value="0" <?= ($row['value'] ?? '') == '0' ? 'selected' : '' ?>>No</option>
                        </select>
                    <?php else: ?>
                        <input type="text" name="settings[<?= e($key) ?>]" class="form-control" value="<?= e($row['value'] ?? '') ?>">
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php
    // Render any other groups not in predefined order
    foreach ($settings as $groupKey => $groupSettings):
        if (in_array($groupKey, $groupOrder, true)) continue;
    ?>
        <div class="form-section">
            <h5 class="mb-3"><i class="fa-solid fa-cog me-2"></i><?= e(ucfirst($groupKey)) ?></h5>
            <div class="row g-3">
                <?php foreach ($groupSettings as $key => $row): ?>
                <div class="col-md-6">
                    <label class="form-label"><?= e(ucwords(str_replace('_', ' ', $key))) ?></label>
                    <input type="text" name="settings[<?= e($key) ?>]" class="form-control" value="<?= e($row['value'] ?? '') ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fa-solid fa-save me-1"></i>Save Settings
    </button>
</form>
