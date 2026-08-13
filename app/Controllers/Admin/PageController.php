<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Page;

class PageController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.pages.index', [
            'pages' => (new Page())->all('sort_order ASC, id DESC'),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.pages.create', [], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
        ]);

        $model = new Page();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']));
        $upload = new Upload();

        $banner = null;
        if ($file = $this->request->file('banner')) {
            $stored = $upload->store($file, 'pages');
            $banner = $stored['path'] ?? null;
        }

        $id = $model->create([
            'title'             => $data['title'],
            'slug'              => $slug,
            'content'           => $this->request->post('content'),
            'banner'            => $banner,
            'template'          => $this->request->post('template') ?: 'default',
            'seo_title'         => $this->request->post('seo_title'),
            'seo_description'   => $this->request->post('seo_description'),
            'seo_keywords'      => $this->request->post('seo_keywords'),
            'canonical_url'     => $this->request->post('canonical_url'),
            'sort_order'        => (int) ($this->request->post('sort_order') ?? 0),
            'status'            => $this->boolVal($this->request->post('status', 1)),
        ]);

        ActivityLog::record(Auth::id(), 'page_create', "Created page #{$id}: {$data['title']}");
        $this->flash('success', 'Page created.');
        $this->redirect(url('/admin/pages'));
    }

    public function edit(int $id): void
    {
        $page = (new Page())->find($id);
        if (!$page) {
            $this->notFound();
        }

        $this->view('admin.pages.edit', ['page' => $page], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Page();
        $page = $model->find($id);
        if (!$page) {
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
            'content'           => $this->request->post('content'),
            'template'          => $this->request->post('template') ?: 'default',
            'seo_title'         => $this->request->post('seo_title'),
            'seo_description'   => $this->request->post('seo_description'),
            'seo_keywords'      => $this->request->post('seo_keywords'),
            'canonical_url'     => $this->request->post('canonical_url'),
            'sort_order'        => (int) ($this->request->post('sort_order') ?? 0),
            'status'            => $this->boolVal($this->request->post('status', 1)),
        ];

        if ($file = $this->request->file('banner')) {
            $stored = $upload->store($file, 'pages');
            if ($stored) {
                $upload->delete($page['banner'] ?? null);
                $update['banner'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        ActivityLog::record(Auth::id(), 'page_update', "Updated page #{$id}");
        $this->flash('success', 'Page updated.');
        $this->redirect(url('/admin/pages/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        $model = new Page();
        $page = $model->find($id);
        if (!$page) {
            $this->notFound();
        }

        (new Upload())->delete($page['banner'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'page_delete', "Deleted page #{$id}: {$page['title']}");
        $this->respondDestroy('Page deleted.', url('/admin/pages'));
    }
}
