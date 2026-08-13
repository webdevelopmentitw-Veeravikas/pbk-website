<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Event extends Model
{
    protected string $table = 'events';

    protected array $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'map_embed',
        'event_date',
        'event_time',
        'banner',
        'registration_link',
        'status',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    public function upcoming(int $limit = 10): array
    {
        return $this->query(
            "SELECT * FROM `events`
             WHERE status = 1
             AND (event_date IS NULL OR event_date >= CURDATE())
             ORDER BY event_date ASC, event_time ASC, id ASC
             LIMIT {$limit}"
        );
    }
}
