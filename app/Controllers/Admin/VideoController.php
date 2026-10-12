<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Video;

class VideoController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.videos.index', [
            'videos' => (new Video())->all('id DESC'),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.videos.create', [], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title'       => 'required|max:255',
            'youtube_url' => 'required|max:500',
        ]);

        $model = new Video();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']));
        $upload = new Upload();

        $thumbnail = null;
        if ($file = $this->request->file('thumbnail')) {
            $stored = $upload->store($file, 'videos');
            $thumbnail = $stored['path'] ?? null;
        }

        $id = $model->create([
            'title'       => $data['title'],
            'slug'        => $slug,
            'description' => $this->request->post('description'),
            'youtube_url' => $data['youtube_url'],
            'thumbnail'   => $thumbnail,
            'status'      => $this->checkboxVal('status'),
        ]);

        ActivityLog::record(Auth::id(), 'video_create', "Created video #{$id}: {$data['title']}");
        $this->flash('success', 'Video created.');
        $this->redirect(url('/admin/videos'));
    }

    public function edit(int $id): void
    {
        $video = (new Video())->find($id);
        if (!$video) {
            $this->notFound();
        }

        $this->view('admin.videos.edit', ['video' => $video], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Video();
        $video = $model->find($id);
        if (!$video) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title'       => 'required|max:255',
            'youtube_url' => 'required|max:500',
        ]);

        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']), $id);
        $upload = new Upload();

        $update = [
            'title'       => $data['title'],
            'slug'        => $slug,
            'description' => $this->request->post('description'),
            'youtube_url' => $data['youtube_url'],
            'status'      => $this->checkboxVal('status'),
        ];

        if ($file = $this->request->file('thumbnail')) {
            $stored = $upload->store($file, 'videos');
            if ($stored) {
                $upload->delete($video['thumbnail'] ?? null);
                $update['thumbnail'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        ActivityLog::record(Auth::id(), 'video_update', "Updated video #{$id}");
        $this->flash('success', 'Video updated.');
        $this->redirect(url('/admin/videos/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        $model = new Video();
        $video = $model->find($id);
        if (!$video) {
            $this->notFound();
        }

        (new Upload())->delete($video['thumbnail'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'video_delete', "Deleted video #{$id}: {$video['title']}");
        $this->respondDestroy('Video deleted.', url('/admin/videos'));
    }
}
