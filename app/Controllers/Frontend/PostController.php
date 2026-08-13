<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Category;
use App\Models\Post;

class PostController extends BaseFrontendController
{
    public function index(): void
    {
        $page = max(1, (int) $this->request->get('page', 1));
        $categorySlug = trim((string) $this->request->get('category', ''));
        $category = null;

        [$where, $params] = $this->publishedWhere();

        if ($categorySlug !== '') {
            $category = (new Category())->findBySlug($categorySlug);
            if ($category && (int) ($category['status'] ?? 0) === 1) {
                $where .= ' AND category_id = :category_id';
                $params['category_id'] = (int) $category['id'];
            }
        }

        $posts = (new Post())->paginate(
            $page,
            12,
            $where,
            $params,
            'publish_date DESC, id DESC'
        );

        $baseUrl = url('/posts');
        if ($categorySlug !== '') {
            $baseUrl .= '?category=' . rawurlencode($categorySlug);
        }

        $this->frontendView('frontend.posts.index', [
            'posts'      => $posts,
            'category'   => $category,
            'categories' => (new Category())->tree(),
            'baseUrl'    => $baseUrl,
        ]);
    }

    public function category(string $slug): void
    {
        $category = (new Category())->findBySlug($slug);
        if (!$category || (int) ($category['status'] ?? 0) !== 1) {
            $this->notFound('Category not found.');
        }

        $page = max(1, (int) $this->request->get('page', 1));
        [$where, $params] = $this->publishedWhere();
        $where .= ' AND category_id = :category_id';
        $params['category_id'] = (int) $category['id'];

        $posts = (new Post())->paginate(
            $page,
            12,
            $where,
            $params,
            'publish_date DESC, id DESC'
        );

        $this->frontendView('frontend.posts.category', [
            'category' => $category,
            'posts'    => $posts,
            'baseUrl'  => url('/posts/category/' . $slug),
        ]);
    }

    public function show(string $slug): void
    {
        $postModel = new Post();
        $post = $postModel->findBySlug($slug);

        if (!$post || !$this->isPublishedPost($post)) {
            $this->notFound('Post not found.');
        }

        $postModel->incrementViews((int) $post['id']);
        $post = $postModel->withRelations((int) $post['id']);

        $this->frontendView('frontend.posts.show', [
            'post'          => $post,
            'relatedPosts'  => $postModel->related((int) $post['id']),
            'tags'          => $post['tags'] ?? [],
        ]);
    }

    private function publishedWhere(): array
    {
        return [
            "status = 'published' AND (publish_date IS NULL OR publish_date <= :now)",
            ['now' => date('Y-m-d H:i:s')],
        ];
    }
}
