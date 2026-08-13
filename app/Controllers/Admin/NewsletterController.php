<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\ActivityLog;
use App\Models\Newsletter;

class NewsletterController extends BaseAdminController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $subscribers = (new Newsletter())->paginate($page, 30);

        $this->view('admin.newsletter.index', [
            'subscribers' => $subscribers,
            'baseUrl'     => url('/admin/newsletter'),
        ], 'admin.layouts.app');
    }

    public function destroy(int $id): void
    {
        $model = new Newsletter();
        $subscriber = $model->find($id);
        if (!$subscriber) {
            $this->notFound();
        }

        $model->delete($id);
        ActivityLog::record(Auth::id(), 'newsletter_delete', "Removed subscriber #{$id}: {$subscriber['email']}");
        $this->respondDestroy('Subscriber removed.', url('/admin/newsletter'));
    }

    public function exportCsv(): void
    {
        $rows = (new Newsletter())->where('status = 1', [], 'subscribed_at DESC');

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="newsletter_subscribers_' . date('Y-m-d') . '.csv"');

        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Email', 'Name', 'Subscribed At']);

        foreach ($rows as $row) {
            fputcsv($out, [
                $row['id'],
                $row['email'],
                $row['name'] ?? '',
                $row['subscribed_at'] ?? '',
            ]);
        }

        fclose($out);
        ActivityLog::record(Auth::id(), 'newsletter_export', 'Exported newsletter subscribers CSV');
        exit;
    }
}
