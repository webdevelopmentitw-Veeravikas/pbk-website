<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\ActivityLog;
use App\Models\ContactMessage;

class ContactController extends BaseAdminController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $messages = (new ContactMessage())->paginate($page, 20);

        $this->view('admin.contact.index', [
            'messages' => $messages,
            'baseUrl'  => url('/admin/contact'),
        ], 'admin.layouts.app');
    }

    public function show(int $id): void
    {
        $message = (new ContactMessage())->find($id);
        if (!$message) {
            $this->notFound();
        }

        if (!(int) $message['is_read']) {
            (new ContactMessage())->update($id, ['is_read' => 1]);
            $message['is_read'] = 1;
        }

        $this->view('admin.contact.show', ['message' => $message], 'admin.layouts.app');
    }

    public function markRead(int $id): void
    {
        $model = new ContactMessage();
        if (!$model->find($id)) {
            $this->notFound();
        }

        $model->update($id, ['is_read' => 1]);
        ActivityLog::record(Auth::id(), 'contact_read', "Marked contact message #{$id} as read");

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Marked as read.']);
        }

        $this->flash('success', 'Marked as read.');
        $this->redirect(url('/admin/contact'));
    }

    public function destroy(int $id): void
    {
        $model = new ContactMessage();
        $message = $model->find($id);
        if (!$message) {
            $this->notFound();
        }

        $model->delete($id);
        ActivityLog::record(Auth::id(), 'contact_delete', "Deleted contact message #{$id}");
        $this->respondDestroy('Message deleted.', url('/admin/contact'));
    }

    public function exportCsv(): void
    {
        $rows = (new ContactMessage())->all('created_at DESC');

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="contact_messages_' . date('Y-m-d') . '.csv"');

        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'IP', 'Read', 'Created At']);

        foreach ($rows as $row) {
            fputcsv($out, [
                $row['id'],
                $row['name'],
                $row['email'],
                $row['phone'] ?? '',
                $row['subject'] ?? '',
                $row['message'],
                $row['ip_address'] ?? '',
                (int) ($row['is_read'] ?? 0) ? 'Yes' : 'No',
                $row['created_at'] ?? '',
            ]);
        }

        fclose($out);
        ActivityLog::record(Auth::id(), 'contact_export', 'Exported contact messages CSV');
        exit;
    }
}
