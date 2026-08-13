<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class PostImage extends Model
{
    protected string $table = 'post_images';

    protected bool $timestamps = false;

    protected array $fillable = [
        'post_id',
        'image_path',
        'caption',
        'sort_order',
    ];
}
