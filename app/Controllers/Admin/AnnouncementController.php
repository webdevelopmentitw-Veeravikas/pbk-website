<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Models\ActivityLog;
use App\Models\Announcement;

class AnnouncementController extends BaseAdminController
{
    private const TYPES = ['breaking', 'scrolling', 'popup', 'alert'];

    public function index(): void
    {
        $type = $this->request->get('type');
        $model = new Announcement();
        $announcements = $type && in_array($type, self::TYPES, true)
            ? $model->where('type = :type', ['type' => $type], 'id DESC')
            : $model->all('id DESC');

        $this->view('admin.announcements.index', [
            'announcements' => $announcements,
            'type'          => $type,
            'types'         => self::TYPES,
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.announcements.create', [
            'types' => self::TYPES,
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
            'type'  => 'required|in:breaking,scrolling,popup,alert',
        ]);

        $model = new Announcement();
        $id = $model->create([
            'title'     => $data['title'],
            'content'   => $this->request->post('content'),
            'type'      => $data['type'],
            'link'      => $this->request->post('link'),
            'starts_at' => $this->request->post('starts_at') ?: null,
            'ends_at'   => $this->request->post('ends_at') ?: null,
            'status'    => $this->boolVal($this->request->post('status', 1)),
        ]);

        ActivityLog::record(Auth::id(), 'announcement_create', "Created announcement #{$id}: {$data['title']}");
        $this->flash('success', 'Announcement created.');
        $this->redirect(url('/admin/announcements'));
    }

    public function edit(int $id): void
    {
        $announcement = (new Announcement())->find($id);
        if (!$announcement) {
            $this->notFound();
        }

        $this->view('admin.announcements.edit', [
            'announcement' => $announcement,
            'types'        => self::TYPES,
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Announcement();
        if (!$model->find($id)) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
            'type'  => 'required|in:breaking,scrolling,popup,alert',
        ]);

        $model->update($id, [
            'title'     => $data['title'],
            'content'   => $this->request->post('content'),
            'type'      => $data['type'],
            'link'      => $this->request->post('link'),
            'starts_at' => $this->request->post('starts_at') ?: null,
            'ends_at'   => $this->request->post('ends_at') ?: null,
            'status'    => $this->boolVal($this->request->post('status', 1)),
        ]);

        ActivityLog::record(Auth::id(), 'announcement_update', "Updated announcement #{$id}");
        $this->flash('success', 'Announcement updated.');
        $this->redirect(url('/admin/announcements/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        $model = new Announcement();
        $announcement = $model->find($id);
        if (!$announcement) {
            $this->notFound();
        }

        $model->delete($id);
        ActivityLog::record(Auth::id(), 'announcement_delete', "Deleted announcement #{$id}: {$announcement['title']}");
        $this->respondDestroy('Announcement deleted.', url('/admin/announcements'));
    }
}
