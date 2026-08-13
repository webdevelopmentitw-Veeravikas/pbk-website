<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Menu extends Model
{
    protected string $table = 'menus';

    protected array $fillable = [
        'parent_id',
        'title',
        'url',
        'url_type',
        'route_name',
        'target',
        'icon',
        'location',
        'sort_order',
        'status',
    ];

    public function tree(?string $location = null): array
    {
        $params = ['status' => 1];
        $where = 'status = :status';

        if ($location !== null) {
            $where .= ' AND location = :location';
            $params['location'] = $location;
        }

        $items = $this->where($where, $params, 'sort_order ASC, id ASC');

        return $this->buildTree($items);
    }

    public function children(?int $parentId): array
    {
        if ($parentId === null) {
            return $this->where('parent_id IS NULL', [], 'sort_order ASC, id ASC');
        }

        return $this->where('parent_id = :parent_id', ['parent_id' => $parentId], 'sort_order ASC, id ASC');
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            $this->update((int) $id, ['sort_order' => $index + 1]);
        }
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
