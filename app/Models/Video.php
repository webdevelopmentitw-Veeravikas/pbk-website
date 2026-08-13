<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Video extends Model
{
    protected string $table = 'videos';

    protected array $fillable = [
        'title',
        'slug',
        'description',
        'youtube_url',
        'thumbnail',
        'status',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }
}
