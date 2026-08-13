<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    protected string $table = 'posts';

    protected array $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'title',
        'slug',
        'short_description',
        'content',
        'featured_image',
        'preview_image',
        'youtube_url',
        'pdf_attachment',
        'is_featured',
        'is_breaking',
        'is_trending',
        'views',
        'publish_date',
        'status',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'canonical_url',
        'og_image',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    public function published(string $orderBy = 'publish_date DESC, id DESC'): array
    {
        return $this->where(
            "status = 'published' AND (publish_date IS NULL OR publish_date <= :now)",
            ['now' => date('Y-m-d H:i:s')],
            $orderBy
        );
    }

    public function latest(int $limit = 10): array
    {
        return $this->query(
            "SELECT * FROM `posts`
             WHERE status = 'published' AND (publish_date IS NULL OR publish_date <= :now)
             ORDER BY publish_date DESC, id DESC
             LIMIT {$limit}",
            ['now' => date('Y-m-d H:i:s')]
        );
    }

    public function featured(int $limit = 10): array
    {
        return $this->query(
            "SELECT * FROM `posts`
             WHERE status = 'published' AND is_featured = 1
             AND (publish_date IS NULL OR publish_date <= :now)
             ORDER BY publish_date DESC, id DESC
             LIMIT {$limit}",
            ['now' => date('Y-m-d H:i:s')]
        );
    }

    public function breaking(int $limit = 5): array
    {
        return $this->query(
            "SELECT * FROM `posts`
             WHERE status = 'published' AND is_breaking = 1
             AND (publish_date IS NULL OR publish_date <= :now)
             ORDER BY publish_date DESC, id DESC
             LIMIT {$limit}",
            ['now' => date('Y-m-d H:i:s')]
        );
    }

    public function trending(int $limit = 10): array
    {
        return $this->query(
            "SELECT * FROM `posts`
             WHERE status = 'published' AND is_trending = 1
             AND (publish_date IS NULL OR publish_date <= :now)
             ORDER BY views DESC, publish_date DESC
             LIMIT {$limit}",
            ['now' => date('Y-m-d H:i:s')]
        );
    }

    public function incrementViews(int $id): void
    {
        $this->db()->query(
            'UPDATE `posts` SET `views` = `views` + 1 WHERE `id` = :id',
            ['id' => $id]
        );
    }

    public function search(string $q): array
    {
        $term = trim($q);
        if ($term === '') {
            return [];
        }

        // Prefer FULLTEXT when available; fall back to LIKE for short terms
        if (mb_strlen($term) >= 3) {
            try {
                $rows = $this->query(
                    "SELECT * FROM `posts`
                     WHERE MATCH(`title`, `short_description`, `content`) AGAINST (:q IN NATURAL LANGUAGE MODE)
                     AND status = 'published'
                     ORDER BY publish_date DESC, id DESC",
                    ['q' => $term]
                );
                if (!empty($rows)) {
                    return $rows;
                }
            } catch (\Throwable) {
                // fall through to LIKE
            }
        }

        $like = '%' . $term . '%';
        return $this->query(
            "SELECT * FROM `posts`
             WHERE status = 'published'
             AND (title LIKE :q1 OR short_description LIKE :q2 OR content LIKE :q3)
             ORDER BY publish_date DESC, id DESC",
            ['q1' => $like, 'q2' => $like, 'q3' => $like]
        );
    }

    public function withRelations(int $id): ?array
    {
        $post = $this->queryOne(
            'SELECT p.*,
                    u.name AS author_name, u.email AS author_email, u.avatar AS author_avatar,
                    c.name AS category_name, c.slug AS category_slug,
                    sc.name AS sub_category_name, sc.slug AS sub_category_slug
             FROM `posts` p
             LEFT JOIN `users` u ON u.id = p.user_id
             LEFT JOIN `categories` c ON c.id = p.category_id
             LEFT JOIN `categories` sc ON sc.id = p.sub_category_id
             WHERE p.id = :id
             LIMIT 1',
            ['id' => $id]
        );

        if (!$post) {
            return null;
        }

        $post['tags'] = $this->query(
            'SELECT t.*
             FROM `tags` t
             INNER JOIN `post_tags` pt ON pt.tag_id = t.id
             WHERE pt.post_id = :post_id
             ORDER BY t.name ASC',
            ['post_id' => $id]
        );

        $post['images'] = $this->query(
            'SELECT * FROM `post_images`
             WHERE post_id = :post_id
             ORDER BY sort_order ASC, id ASC',
            ['post_id' => $id]
        );

        return $post;
    }

    public function syncTags(int $postId, array $tagIds): void
    {
        $db = $this->db();
        $db->beginTransaction();

        try {
            $db->delete('post_tags', 'post_id = :post_id', ['post_id' => $postId]);

            foreach ($tagIds as $tagId) {
                $db->insert('post_tags', [
                    'post_id' => $postId,
                    'tag_id'  => (int) $tagId,
                ]);
            }

            $db->commit();
        } catch (\Throwable $e) {
            $db->rollBack();
            throw $e;
        }
    }

    public function related(int $postId, int $limit = 4): array
    {
        $post = $this->find($postId);
        if (!$post || empty($post['category_id'])) {
            return [];
        }

        return $this->query(
            "SELECT * FROM `posts`
             WHERE category_id = :category_id
             AND id != :post_id
             AND status = 'published'
             AND (publish_date IS NULL OR publish_date <= :now)
             ORDER BY publish_date DESC, id DESC
             LIMIT {$limit}",
            [
                'category_id' => $post['category_id'],
                'post_id'     => $postId,
                'now'         => date('Y-m-d H:i:s'),
            ]
        );
    }
}
