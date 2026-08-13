<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Gallery extends Model
{
    protected string $table = 'gallery';

    protected array $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'status',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    public function withImages(int $id): ?array
    {
        $gallery = $this->find($id);
        if (!$gallery) {
            return null;
        }

        $gallery['images'] = $this->query(
            'SELECT * FROM `gallery_images`
             WHERE gallery_id = :gallery_id
             ORDER BY sort_order ASC, id ASC',
            ['gallery_id' => $id]
        );

        return $gallery;
    }
}
