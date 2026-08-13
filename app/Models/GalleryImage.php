<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class GalleryImage extends Model
{
    protected string $table = 'gallery_images';

    protected bool $timestamps = false;

    protected array $fillable = [
        'gallery_id',
        'image_path',
        'caption',
        'sort_order',
    ];
}
