<?php

declare(strict_types=1);

namespace App\Controllers\Frontend;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;

class SearchController extends BaseFrontendController
{
    public function index(): void
    {
        $q = trim((string) $this->request->get('q', ''));
        $posts = [];
        $pages = [];
        $categories = [];

        if ($q !== '') {
            $like = '%' . $q . '%';
            $now = date('Y-m-d H:i:s');

            $posts = (new Post())->query(
                "SELECT id, title, slug, short_description, featured_image, publish_date
                 FROM `posts`
                 WHERE status = 'published'
                 AND (publish_date IS NULL OR publish_date <= :now)
                 AND (title LIKE :q1 OR short_description LIKE :q2 OR content LIKE :q3 OR slug LIKE :q4)
                 ORDER BY publish_date DESC, id DESC
                 LIMIT 20",
                ['now' => $now, 'q1' => $like, 'q2' => $like, 'q3' => $like, 'q4' => $like]
            );

            $pages = (new Page())->query(
                "SELECT id, title, slug
                 FROM `pages`
                 WHERE status = 1
                 AND (title LIKE :q1 OR content LIKE :q2 OR slug LIKE :q3)
                 ORDER BY sort_order ASC, id DESC
                 LIMIT 20",
                ['q1' => $like, 'q2' => $like, 'q3' => $like]
            );

            $categories = (new Category())->query(
                "SELECT id, name, slug, image, description
                 FROM `categories`
                 WHERE status = 1
                 AND (name LIKE :q1 OR description LIKE :q2 OR slug LIKE :q3)
                 ORDER BY sort_order ASC, name ASC
                 LIMIT 20",
                ['q1' => $like, 'q2' => $like, 'q3' => $like]
            );
        }

        $this->frontendView('frontend.search.index', [
            'query'      => $q,
            'posts'      => $posts,
            'pages'      => $pages,
            'categories' => $categories,
        ]);
    }
}
