<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\ActivityLog;
use App\Models\Setting;

class SettingController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.settings.index', [
            'settings' => (new Setting())->allGrouped(),
        ], 'admin.layouts.app');
    }

    public function update(): void
    {
        $settings = $this->request->post('settings') ?? [];
        if (!is_array($settings)) {
            $this->flash('danger', 'Invalid settings data.');
            $this->back();
        }

        $model = new Setting();

        foreach ($settings as $key => $value) {
            if (!is_string($key)) {
                continue;
            }

            $existing = $model->queryOne(
                'SELECT * FROM `settings` WHERE `key` = :key LIMIT 1',
                ['key' => $key]
            );

            $group = $existing['group'] ?? 'general';

            if (is_array($value)) {
                $value = json_encode($value);
            }

            $model->set($key, $value, $group);
        }

        ActivityLog::record(Auth::id(), 'settings_update', 'Site settings updated');

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Settings saved.']);
        }

        $this->flash('success', 'Settings saved.');
        $this->redirect(url('/admin/settings'));
    }
}
