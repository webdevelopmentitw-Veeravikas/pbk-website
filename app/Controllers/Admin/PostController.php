<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Upload;
use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\Tag;

class PostController extends BaseAdminController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $posts = (new Post())->paginate($page, 20);

        $this->view('admin.posts.index', [
            'posts'     => $posts,
            'baseUrl'   => url('/admin/posts'),
        ], 'admin.layouts.app');
    }

    public function create(): void
    {
        $this->view('admin.posts.create', [
            'categories' => (new Category())->where('status = 1', [], 'name ASC'),
        ], 'admin.layouts.app');
    }

    public function store(): void
    {
        $data = $this->validate($this->request->all(), [
            'title'  => 'required|max:255',
            'status' => 'required|in:draft,published,archived',
        ]);

        $model = new Post();
        $slug = $this->uniqueSlug($model, slugify($this->request->post('slug') ?: $data['title']));
        $upload = new Upload();

        $featuredImage = null;
        $previewImage = null;
        $pdfAttachment = null;

        if ($file = $this->request->file('featured_image')) {
            $stored = $upload->store($file, 'posts');
            $featuredImage = $stored['path'] ?? null;
        }
        if ($file = $this->request->file('preview_image')) {
            $stored = $upload->store($file, 'posts');
            $previewImage = $stored['path'] ?? null;
        }
        if ($file = $this->request->file('pdf_attachment')) {
            $stored = $upload->store($file, 'posts', false);
            $pdfAttachment = $stored['path'] ?? null;
        }

        $id = $model->create([
            'user_id'           => Auth::id(),
            'category_id'       => $this->request->post('category_id') ?: null,
            'sub_category_id'   => $this->request->post('sub_category_id') ?: null,
            'title'             => $data['title'],
            'slug'              => $slug,
            'short_description' => $this->request->post('short_description'),
            'content'           => $this->request->post('content'),
            'featured_image'    => $featuredImage,
            'preview_image'     => $previewImage,
            'youtube_url'       => $this->request->post('youtube_url'),
            'pdf_attachment'    => $pdfAttachment,
            'is_featured'       => $this->boolVal($this->request->post('is_featured')),
            'is_breaking'       => $this->boolVal($this->request->post('is_breaking')),
            'is_trending'       => $this->boolVal($this->request->post('is_trending')),
            'publish_date'      => $this->request->post('publish_date') ?: null,
            'status'            => $data['status'],
            'seo_title'         => $this->request->post('seo_title'),
            'seo_description'   => $this->request->post('seo_description'),
            'seo_keywords'      => $this->request->post('seo_keywords'),
            'canonical_url'     => $this->request->post('canonical_url'),
            'og_image'          => $this->request->post('og_image'),
        ]);

        $this->syncTags($model, $id, (string) $this->request->post('tags', ''));
        $this->storeGalleryImages($id, $upload);

        ActivityLog::record(Auth::id(), 'post_create', "Created post #{$id}: {$data['title']}");
        $this->flash('success', 'Post created.');
        $this->redirect(url('/admin/posts'));
    }

    public function edit(int $id): void
    {
        $model = new Post();
        $post = $model->withRelations($id);
        if (!$post) {
            $this->notFound();
        }

        $tagNames = implode(', ', array_column($post['tags'] ?? [], 'name'));

        $this->view('admin.posts.edit', [
            'post'       => $post,
            'tags'       => $tagNames,
            'categories' => (new Category())->where('status = 1', [], 'name ASC'),
        ], 'admin.layouts.app');
    }

    public function update(int $id): void
    {
        $model = new Post();
        $post = $model->find($id);
        if (!$post) {
            $this->notFound();
        }

        $data = $this->validate($this->request->all(), [
            'title'  => 'required|max:255',
            'status' => 'required|in:draft,published,archived',
        ]);

        $slugInput = $this->request->post('slug') ?: $data['title'];
        $slug = $this->uniqueSlug($model, slugify($slugInput), $id);
        $upload = new Upload();

        $update = [
            'category_id'       => $this->request->post('category_id') ?: null,
            'sub_category_id'   => $this->request->post('sub_category_id') ?: null,
            'title'             => $data['title'],
            'slug'              => $slug,
            'short_description' => $this->request->post('short_description'),
            'content'           => $this->request->post('content'),
            'youtube_url'       => $this->request->post('youtube_url'),
            'is_featured'       => $this->boolVal($this->request->post('is_featured')),
            'is_breaking'       => $this->boolVal($this->request->post('is_breaking')),
            'is_trending'       => $this->boolVal($this->request->post('is_trending')),
            'publish_date'      => $this->request->post('publish_date') ?: null,
            'status'            => $data['status'],
            'seo_title'         => $this->request->post('seo_title'),
            'seo_description'   => $this->request->post('seo_description'),
            'seo_keywords'      => $this->request->post('seo_keywords'),
            'canonical_url'     => $this->request->post('canonical_url'),
            'og_image'          => $this->request->post('og_image'),
        ];

        if ($file = $this->request->file('featured_image')) {
            $stored = $upload->store($file, 'posts');
            if ($stored) {
                $upload->delete($post['featured_image'] ?? null);
                $update['featured_image'] = $stored['path'];
            }
        }
        if ($file = $this->request->file('preview_image')) {
            $stored = $upload->store($file, 'posts');
            if ($stored) {
                $upload->delete($post['preview_image'] ?? null);
                $update['preview_image'] = $stored['path'];
            }
        }
        if ($file = $this->request->file('pdf_attachment')) {
            $stored = $upload->store($file, 'posts', false);
            if ($stored) {
                $upload->delete($post['pdf_attachment'] ?? null);
                $update['pdf_attachment'] = $stored['path'];
            }
        }

        $model->update($id, $update);
        $this->syncTags($model, $id, (string) $this->request->post('tags', ''));
        $this->storeGalleryImages($id, $upload);

        ActivityLog::record(Auth::id(), 'post_update', "Updated post #{$id}");
        $this->flash('success', 'Post updated.');
        $this->redirect(url('/admin/posts/' . $id . '/edit'));
    }

    public function destroy(int $id): void
    {
        $model = new Post();
        $post = $model->withRelations($id);
        if (!$post) {
            $this->notFound();
        }

        $upload = new Upload();
        $upload->delete($post['featured_image'] ?? null);
        $upload->delete($post['preview_image'] ?? null);
        $upload->delete($post['pdf_attachment'] ?? null);

        foreach ($post['images'] ?? [] as $img) {
            $upload->delete($img['image_path'] ?? null);
        }

        $model->delete($id);
        ActivityLog::record(Auth::id(), 'post_delete', "Deleted post #{$id}: {$post['title']}");
        $this->respondDestroy('Post deleted.', url('/admin/posts'));
    }

    private function syncTags(Post $model, int $postId, string $tagsStr): void
    {
        $tagModel = new Tag();
        $tagIds = [];

        foreach (array_filter(array_map('trim', explode(',', $tagsStr))) as $name) {
            $tag = $tagModel->findOrCreateByName($name);
            $tagIds[] = (int) $tag['id'];
        }

        $model->syncTags($postId, $tagIds);
    }

    private function storeGalleryImages(int $postId, Upload $upload): void
    {
        $files = $this->request->files('gallery_images');
        if (empty($files)) {
            return;
        }

        $imageModel = new PostImage();
        $sortOrder = $imageModel->count('post_id = :pid', ['pid' => $postId]);

        foreach ($files as $file) {
            $stored = $upload->store($file, 'posts/gallery');
            if (!$stored) {
                continue;
            }
            $imageModel->create([
                'post_id'    => $postId,
                'image_path' => $stored['path'],
                'caption'    => null,
                'sort_order' => ++$sortOrder,
            ]);
        }
    }
}
