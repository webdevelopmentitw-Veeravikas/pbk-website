<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Event;

class EventController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.events.index', [
            'events' => (new Event())->all('event_date DESC, id DESC'),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.events.create', [], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
        ]);

        $model = new Event();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']));
        $upload = new Upload();

        $banner = null;
        if ($file = $this->request->file('banner')) {
            $stored = $upload->store($file, 'events');
            $banner = $stored['path'] ?? null;
        }

        $id = $model->create([
            'title'             => $data['title'],
            'slug'              => $slug,
            'description'       => $this->request->post('description'),
            'location'          => $this->request->post('location'),
            'map_embed'         => $this->request->post('map_embed'),
            'event_date'        => $this->request->post('event_date') ?: null,
            'event_time'        => $this->request->post('event_time') ?: null,
            'banner'            => $banner,
            'registration_link' => $this->request->post('registration_link'),
            'status'            => $this->boolVal($this->request->post('status', 1)),
        ]);

        ActivityLog::record(Auth::id(), 'event_create', "Created event #{$id}: {$data['title']}");
        $this->flash('success', 'Event created.');
        $this->redirect(url('/admin/events'));
    }

    public function edit(int $id): void
    {
        $event = (new Event())->find($id);
        if (!$event) {
            $this->notFound();
        }

        $this->view('admin.events.edit', ['event' => $event], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Event();
        $event = $model->find($id);
        if (!$event) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
        ]);

        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']), $id);
        $upload = new Upload();

        $update = [
            'title'             => $data['title'],
            'slug'              => $slug,
            'description'       => $this->request->post('description'),
            'location'          => $this->request->post('location'),
            'map_embed'         => $this->request->post('map_embed'),
            'event_date'        => $this->request->post('event_date') ?: null,
            'event_time'        => $this->request->post('event_time') ?: null,
            'registration_link' => $this->request->post('registration_link'),
            'status'            => $this->boolVal($this->request->post('status', 1)),
        ];

        if ($file = $this->request->file('banner')) {
            $stored = $upload->store($file, 'events');
            if ($stored) {
                $upload->delete($event['banner'] ?? null);
                $update['banner'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        ActivityLog::record(Auth::id(), 'event_update', "Updated event #{$id}");
        $this->flash('success', 'Event updated.');
        $this->redirect(url('/admin/events/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        $model = new Event();
        $event = $model->find($id);
        if (!$event) {
            $this->notFound();
        }

        (new Upload())->delete($event['banner'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'event_delete', "Deleted event #{$id}: {$event['title']}");
        $this->respondDestroy('Event deleted.', url('/admin/events'));
    }
}
