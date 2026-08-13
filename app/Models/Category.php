<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Category extends Model
{
    protected string $table = 'categories';

    protected array $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'banner',
        'image',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'sort_order',
        'status',
    ];

    public function tree(): array
    {
        $items = $this->where('status = :status', ['status' => 1], 'sort_order ASC, id ASC');

        return $this->buildTree($items);
    }

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    public function children(?int $parentId): array
    {
        if ($parentId === null) {
            return $this->where('parent_id IS NULL AND status = :status', ['status' => 1], 'sort_order ASC, id ASC');
        }

        return $this->where(
            'parent_id = :parent_id AND status = :status',
            ['parent_id' => $parentId, 'status' => 1],
            'sort_order ASC, id ASC'
        );
    }

    private function buildTree(array $items, ?int $parentId = null): array
    {
        $branch = [];

        foreach ($items as $item) {
            $itemParentId = $item['parent_id'] !== null ? (int) $item['parent_id'] : null;

            if ($itemParentId === $parentId) {
                $item['children'] = $this->buildTree($items, (int) $item['id']);
                $branch[] = $item;
            }
        }

        return $branch;
    }
}
