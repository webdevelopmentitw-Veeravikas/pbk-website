<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Category;

class CategoryController extends BaseAdminController
{
    public function index(): void
    {
        $model = new Category();

        $this->view('admin.categories.index', [
            'categories' => $model->all('sort_order ASC, id ASC'),
            'tree'       => $model->tree(),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.categories.create', [
            'parents' => (new Category())->all('name ASC'),
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'name'   => 'required|max:150',
            'status' => 'nullable',
        ]);

        $model = new Category();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['name']));
        $upload = new Upload();

        $banner = null;
        $image = null;
        if ($file = $this->request->file('banner')) {
            $stored = $upload->store($file, 'categories');
            $banner = $stored['path'] ?? null;
        }
        if ($file = $this->request->file('image')) {
            $stored = $upload->store($file, 'categories');
            $image = $stored['path'] ?? null;
        }

        $id = $model->create([
            'parent_id'       => $this->request->post('parent_id') ?: null,
            'name'            => $data['name'],
            'slug'            => $slug,
            'description'     => $this->request->post('description'),
            'banner'          => $banner,
            'image'           => $image,
            'seo_title'       => $this->request->post('seo_title'),
            'seo_description' => $this->request->post('seo_description'),
            'seo_keywords'    => $this->request->post('seo_keywords'),
            'sort_order'      => (int) ($this->request->post('sort_order') ?? 0),
            'status'          => $this->checkboxVal('status'),
        ]);

        ActivityLog::record(Auth::id(), 'category_create', "Created category #{$id}: {$data['name']}");
        $this->flash('success', 'Category created.');
        $this->redirect(url('/admin/categories'));
    }

    public function edit(int $id): void
    {
        $model = new Category();
        $category = $model->find($id);
        if (!$category) {
            $this->notFound();
        }

        $this->view('admin.categories.edit', [
            'category' => $category,
            'parents'  => $model->where('id != :id', ['id' => $id], 'name ASC'),
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Category();
        $category = $model->find($id);
        if (!$category) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'name' => 'required|max:150',
        ]);

        $slugInput = $this->request->post('slug') ?: $data['name'];
        $slug = $this->uniqueSlug($model, slugify($slugInput), $id);
        $upload = new Upload();

        $update = [
            'parent_id'       => $this->request->post('parent_id') ?: null,
            'name'            => $data['name'],
            'slug'            => $slug,
            'description'     => $this->request->post('description'),
            'seo_title'       => $this->request->post('seo_title'),
            'seo_description' => $this->request->post('seo_description'),
            'seo_keywords'    => $this->request->post('seo_keywords'),
            'sort_order'      => (int) ($this->request->post('sort_order') ?? 0),
            'status'          => $this->checkboxVal('status'),
        ];

        if ($file = $this->request->file('banner')) {
            $stored = $upload->store($file, 'categories');
            if ($stored) {
                $upload->delete($category['banner'] ?? null);
                $update['banner'] = $stored['path'];
            }
        }
        if ($file = $this->request->file('image')) {
            $stored = $upload->store($file, 'categories');
            if ($stored) {
                $upload->delete($category['image'] ?? null);
                $update['image'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        ActivityLog::record(Auth::id(), 'category_update', "Updated category #{$id}");
        $this->flash('success', 'Category updated.');
        $this->redirect(url('/admin/categories'));
    }

    public function destroy(int $id): void
    {
        $model = new Category();
        $category = $model->find($id);
        if (!$category) {
            $this->notFound();
        }

        $upload = new Upload();
        $upload->delete($category['banner'] ?? null);
        $upload->delete($category['image'] ?? null);
        $model->delete($id);

        ActivityLog::record(Auth::id(), 'category_delete', "Deleted category #{$id}: {$category['name']}");
        $this->respondDestroy('Category deleted.', url('/admin/categories'));
    }
}
