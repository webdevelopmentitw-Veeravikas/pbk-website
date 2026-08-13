<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Banner;
use App\Models\Category;

class BannerController extends BaseAdminController
{
    private const TYPES = ['slider', 'popup', 'sidebar', 'footer', 'advertisement', 'category'];

    public function index(): void
    {
        $type = $this->request->get('type', 'slider');
        if (!in_array($type, self::TYPES, true)) {
            $type = 'slider';
        }

        $model = new Banner();
        $banners = $model->where('type = :type', ['type' => $type], 'sort_order ASC, id ASC');

        $this->view('admin.banners.index', [
            'banners'    => $banners,
            'type'       => $type,
            'types'      => self::TYPES,
            'categories' => (new Category())->where('status = 1', [], 'name ASC'),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $type = $this->request->get('type', 'slider');

        $this->view('admin.banners.create', [
            'type'       => $type,
            'types'      => self::TYPES,
            'categories' => (new Category())->where('status = 1', [], 'name ASC'),
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title'  => 'required|max:255',
            'type'   => 'required|in:slider,popup,sidebar,footer,advertisement,category',
            'target' => 'required|in:_self,_blank',
        ]);

        $upload = new Upload();
        $image = null;
        $mobileImage = null;

        if ($file = $this->request->file('image')) {
            $stored = $upload->store($file, 'banners');
            $image = $stored['path'] ?? null;
        }
        if (!$image) {
            $this->flash('danger', 'Banner image is required.');
            $this->back();
        }

        if ($file = $this->request->file('mobile_image')) {
            $stored = $upload->store($file, 'banners');
            $mobileImage = $stored['path'] ?? null;
        }

        $model = new Banner();
        $id = $model->create([
            'title'        => $data['title'],
            'subtitle'     => $this->request->post('subtitle'),
            'image'        => $image,
            'mobile_image' => $mobileImage,
            'link'         => $this->request->post('link'),
            'target'       => $data['target'],
            'type'         => $data['type'],
            'category_id'  => $this->request->post('category_id') ?: null,
            'sort_order'   => (int) ($this->request->post('sort_order') ?? 0),
            'status'       => $this->boolVal($this->request->post('status', 1)),
            'starts_at'    => $this->request->post('starts_at') ?: null,
            'ends_at'      => $this->request->post('ends_at') ?: null,
        ]);

        ActivityLog::record(Auth::id(), 'banner_create', "Created banner #{$id}: {$data['title']}");
        $this->flash('success', 'Banner created.');
        $this->redirect(url('/admin/banners?type=' . $data['type']));
    }

    public function edit(int $id): void
    {
        $banner = (new Banner())->find($id);
        if (!$banner) {
            $this->notFound();
        }

        $this->view('admin.banners.edit', [
            'banner'     => $banner,
            'types'      => self::TYPES,
            'categories' => (new Category())->where('status = 1', [], 'name ASC'),
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Banner();
        $banner = $model->find($id);
        if (!$banner) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title'  => 'required|max:255',
            'type'   => 'required|in:slider,popup,sidebar,footer,advertisement,category',
            'target' => 'required|in:_self,_blank',
        ]);

        $upload = new Upload();
        $update = [
            'title'        => $data['title'],
            'subtitle'     => $this->request->post('subtitle'),
            'link'         => $this->request->post('link'),
            'target'       => $data['target'],
            'type'         => $data['type'],
            'category_id'  => $this->request->post('category_id') ?: null,
            'sort_order'   => (int) ($this->request->post('sort_order') ?? 0),
            'status'       => $this->boolVal($this->request->post('status', 1)),
            'starts_at'    => $this->request->post('starts_at') ?: null,
            'ends_at'      => $this->request->post('ends_at') ?: null,
        ];

        if ($file = $this->request->file('image')) {
            $stored = $upload->store($file, 'banners');
            if ($stored) {
                $upload->delete($banner['image'] ?? null);
                $update['image'] = $stored['path'];
            }
        }
        if ($file = $this->request->file('mobile_image')) {
            $stored = $upload->store($file, 'banners');
            if ($stored) {
                $upload->delete($banner['mobile_image'] ?? null);
                $update['mobile_image'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        ActivityLog::record(Auth::id(), 'banner_update', "Updated banner #{$id}");
        $this->flash('success', 'Banner updated.');
        $this->redirect(url('/admin/banners?type=' . $data['type']));
    }

    public function destroy(int $id): void
    {
        $model = new Banner();
        $banner = $model->find($id);
        if (!$banner) {
            $this->notFound();
        }

        $upload = new Upload();
        $upload->delete($banner['image'] ?? null);
        $upload->delete($banner['mobile_image'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'banner_delete', "Deleted banner #{$id}: {$banner['title']}");
        $this->respondDestroy('Banner deleted.', url('/admin/banners?type=' . ($banner['type'] ?? 'slider')));
    }
}
