<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Tag extends Model
{
    protected string $table = 'tags';

    protected array $fillable = [
        'name',
        'slug',
    ];

    public function findOrCreateByName(string $name): array
    {
        $existing = $this->findBy('name', $name);
        if ($existing) {
            return $existing;
        }

        $slug = slugify($name);
        $bySlug = $this->findBy('slug', $slug);
        if ($bySlug) {
            return $bySlug;
        }

        $id = $this->create([
            'name' => $name,
            'slug' => $slug,
        ]);

        return $this->find($id) ?? [
            'id'   => $id,
            'name' => $name,
            'slug' => $slug,
        ];
    }
}
