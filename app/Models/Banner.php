<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Banner extends Model
{
    protected string $table = 'banners';

    protected array $fillable = [
        'title',
        'subtitle',
        'image',
        'mobile_image',
        'link',
        'target',
        'type',
        'category_id',
        'sort_order',
        'status',
        'starts_at',
        'ends_at',
    ];

    public function activeByType(string $type): array
    {
        $now = date('Y-m-d H:i:s');

        return $this->query(
            'SELECT * FROM `banners`
             WHERE `type` = :type
             AND status = 1
             AND (starts_at IS NULL OR starts_at <= :starts_before)
             AND (ends_at IS NULL OR ends_at >= :ends_after)
             ORDER BY sort_order ASC, id ASC',
            [
                'type' => $type,
                'starts_before' => $now,
                'ends_after' => $now,
            ]
        );
    }
}
