<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\ActivityLog;

class ActivityController extends BaseAdminController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $model = new ActivityLog();

        $paginator = $model->paginate($page, 25);

        $paginator['data'] = $model->query(
            'SELECT al.*, u.name AS user_name, u.email AS user_email
             FROM `activity_logs` al
             LEFT JOIN `users` u ON u.id = al.user_id
             ORDER BY al.created_at DESC, al.id DESC
             LIMIT ' . (int) $paginator['per_page'] . ' OFFSET ' . (int) (($page - 1) * $paginator['per_page'])
        );

        $this->view('admin.activity.index', [
            'logs'    => $paginator,
            'baseUrl' => url('/admin/activity'),
        ], 'admin.layouts.app');
    }
}
