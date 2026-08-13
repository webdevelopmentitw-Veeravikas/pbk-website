<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Page extends Model
{
    protected string $table = 'pages';

    protected array $fillable = [
        'title',
        'slug',
        'content',
        'banner',
        'template',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'canonical_url',
        'sort_order',
        'status',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }
}
