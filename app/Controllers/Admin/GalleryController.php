<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryController extends BaseAdminController
{
    public function index(): void
    {
        $this->view('admin.gallery.index', [
            'galleries' => (new Gallery())->all('id DESC'),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.gallery.create', [], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
        ]);

        $model = new Gallery();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']));
        $upload = new Upload();

        $coverImage = null;
        if ($file = $this->request->file('cover_image')) {
            $stored = $upload->store($file, 'gallery');
            $coverImage = $stored['path'] ?? null;
        }

        $id = $model->create([
            'title'       => $data['title'],
            'slug'        => $slug,
            'description' => $this->request->post('description'),
            'cover_image' => $coverImage,
            'status'      => $this->boolVal($this->request->post('status', 1)),
        ]);

        $this->storeGalleryImages($id, $upload);

        ActivityLog::record(Auth::id(), 'gallery_create', "Created gallery #{$id}: {$data['title']}");
        $this->flash('success', 'Gallery album created.');
        $this->redirect(url('/admin/gallery/' . $id . '/edit'));
    }

    public function edit(int $id): void
    {
        $gallery = (new Gallery())->withImages($id);
        if (!$gallery) {
            $this->notFound();
        }

        $this->view('admin.gallery.edit', ['gallery' => $gallery], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Gallery();
        $gallery = $model->find($id);
        if (!$gallery) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title' => 'required|max:255',
        ]);

        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']), $id);
        $upload = new Upload();

        $update = [
            'title'       => $data['title'],
            'slug'        => $slug,
            'description' => $this->request->post('description'),
            'status'      => $this->boolVal($this->request->post('status', 1)),
        ];

        if ($file = $this->request->file('cover_image')) {
            $stored = $upload->store($file, 'gallery');
            if ($stored) {
                $upload->delete($gallery['cover_image'] ?? null);
                $update['cover_image'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        $this->storeGalleryImages($id, $upload);

        ActivityLog::record(Auth::id(), 'gallery_update', "Updated gallery #{$id}");
        $this->flash('success', 'Gallery updated.');
        $this->redirect(url('/admin/gallery/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        $model = new Gallery();
        $gallery = $model->withImages($id);
        if (!$gallery) {
            $this->notFound();
        }

        $upload = new Upload();
        $upload->delete($gallery['cover_image'] ?? null);
        foreach ($gallery['images'] ?? [] as $img) {
            $upload->delete($img['image_path'] ?? null);
        }

        $model->delete($id);
        ActivityLog::record(Auth::id(), 'gallery_delete', "Deleted gallery #{$id}: {$gallery['title']}");
        $this->respondDestroy('Gallery deleted.', url('/admin/gallery'));
    }

    public function uploadImages(int $id): void
    {
        $model = new Gallery();
        $gallery = $model->find($id);
        if (!$gallery) {
            $this->notFound();
        }

        $upload = new Upload();
        $this->storeGalleryImages($id, $upload);

        ActivityLog::record(Auth::id(), 'gallery_images_upload', "Uploaded images to gallery #{$id}");

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Images uploaded.']);
        }

        $this->flash('success', 'Images uploaded.');
        $this->redirect(url('/admin/gallery/' . $id . '/edit'));
    }

    public function deleteImage(int $id): void
    {
        $imageModel = new GalleryImage();
        $image = $imageModel->find($id);
        if (!$image) {
            $this->notFound();
        }

        (new Upload())->delete($image['image_path'] ?? null);
        $imageModel->delete($id);

        ActivityLog::record(Auth::id(), 'gallery_image_delete', "Deleted gallery image #{$id}");

        if ($this->request->isAjax()) {
            $this->json(['success' => true, 'message' => 'Image deleted.']);
        }

        $this->flash('success', 'Image deleted.');
        $this->redirect(url('/admin/gallery/' . $image['gallery_id'] . '/edit'));
    }

    private function storeGalleryImages(int $galleryId, Upload $upload): void
    {
        $files = $this->request->files('images');
        if (empty($files)) {
            return;
        }

        $imageModel = new GalleryImage();
        $sortOrder = $imageModel->count('gallery_id = :gid', ['gid' => $galleryId]);

        foreach ($files as $file) {
            $stored = $upload->store($file, 'gallery');
            if (!$stored) {
                continue;
            }
            $imageModel->create([
                'gallery_id' => $galleryId,
                'image_path' => $stored['path'],
                'caption'    => null,
                'sort_order' => ++$sortOrder,
            ]);
        }
    }
}
