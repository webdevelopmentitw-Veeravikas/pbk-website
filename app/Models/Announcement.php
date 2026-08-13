<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Announcement extends Model
{
    protected string $table = 'announcements';

    protected array $fillable = [
        'title',
        'content',
        'type',
        'link',
        'starts_at',
        'ends_at',
        'status',
    ];

    public function activeByType(string $type): array
    {
        $now = date('Y-m-d H:i:s');

        return $this->query(
            'SELECT * FROM `announcements`
             WHERE `type` = :type
             AND status = 1
             AND (starts_at IS NULL OR starts_at <= :starts_before)
             AND (ends_at IS NULL OR ends_at >= :ends_after)
             ORDER BY id DESC',
            [
                'type' => $type,
                'starts_before' => $now,
                'ends_after' => $now,
            ]
        );
    }
}
