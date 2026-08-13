<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class OrganizationTeam extends Model
{
    protected string $table = 'organization_teams';

    protected array $fillable = [
        'name',
        'slug',
        'description',
        'banner',
        'image',
        'sort_order',
        'status',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    public function active(string $orderBy = 'sort_order ASC, id ASC'): array
    {
        return $this->where('status = 1', [], $orderBy);
    }

    public function withMemberCount(?int $status = 1): array
    {
        $sql = 'SELECT t.*,
                       (SELECT COUNT(*) FROM organization_members m
                        WHERE m.team_id = t.id' . ($status !== null ? ' AND m.status = 1' : '') . ') AS member_count
                FROM organization_teams t';
        if ($status !== null) {
            $sql .= ' WHERE t.status = 1';
        }
        $sql .= ' ORDER BY t.sort_order ASC, t.id ASC';
        return $this->query($sql);
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            $this->update((int) $id, ['sort_order' => $index + 1]);
        }
    }
}
