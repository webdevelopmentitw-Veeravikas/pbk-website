<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Core\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(): void
    {
        $q = trim((string) $this->request->get('q', ''));
        $limit = min(20, max(1, (int) $this->request->get('limit', 10)));

        if ($q === '') {
            $this->json([
                'success' => true,
                'data'    => ['posts' => [], 'pages' => [], 'categories' => []],
            ]);
            return;
        }

        $like = '%' . $q . '%';

        $posts = (new Post())->query(
            "SELECT id, title, slug, short_description, featured_image, publish_date
             FROM `posts`
             WHERE status = 'published'
             AND (title LIKE :q1 OR short_description LIKE :q2 OR slug LIKE :q3)
             ORDER BY publish_date DESC, id DESC
             LIMIT {$limit}",
            ['q1' => $like, 'q2' => $like, 'q3' => $like]
        );

        $pages = (new Page())->query(
            "SELECT id, title, slug
             FROM `pages`
             WHERE status = 1
             AND (title LIKE :q1 OR content LIKE :q2 OR slug LIKE :q3)
             ORDER BY sort_order ASC, id DESC
             LIMIT {$limit}",
            ['q1' => $like, 'q2' => $like, 'q3' => $like]
        );

        $categories = (new Category())->query(
            "SELECT id, name, slug, image
             FROM `categories`
             WHERE status = 1
             AND (name LIKE :q1 OR description LIKE :q2 OR slug LIKE :q3)
             ORDER BY sort_order ASC, name ASC
             LIMIT {$limit}",
            ['q1' => $like, 'q2' => $like, 'q3' => $like]
        );

        $this->json([
            'success' => true,
            'query'   => $q,
            'data'    => [
                'posts'      => $posts,
                'pages'      => $pages,
                'categories' => $categories,
            ],
        ]);
    }
}
