<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class OrganizationMember extends Model
{
    protected string $table = 'organization_members';

    protected array $fillable = [
        'team_id',
        'name',
        'tamil_name',
        'english_name',
        'photo',
        'cover_image',
        'designation',
        'position',
        'assembly',
        'parliament',
        'district',
        'state',
        'zone',
        'phone',
        'email',
        'whatsapp',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'website',
        'biography',
        'joining_date',
        'sort_order',
        'featured',
        'status',
    ];

    public function byTeam(int $teamId, bool $activeOnly = true): array
    {
        $where = 'team_id = :tid';
        $params = ['tid' => $teamId];
        if ($activeOnly) {
            $where .= ' AND status = 1';
        }
        return $this->where($where, $params, 'sort_order ASC, id ASC');
    }

    public function withTeam(int $id): ?array
    {
        return $this->queryOne(
            'SELECT m.*, t.name AS team_name, t.slug AS team_slug
             FROM organization_members m
             INNER JOIN organization_teams t ON t.id = m.team_id
             WHERE m.id = :id
             LIMIT 1',
            ['id' => $id]
        );
    }

    public function search(array $filters, int $page = 1, int $perPage = 15): array
    {
        $where = ['1=1'];
        $params = [];

        if (!empty($filters['q'])) {
            $like = '%' . $filters['q'] . '%';
            $where[] = '(m.name LIKE :q1 OR m.tamil_name LIKE :q2 OR m.english_name LIKE :q3 OR m.designation LIKE :q4 OR m.district LIKE :q5 OR m.assembly LIKE :q6)';
            $params['q1'] = $like;
            $params['q2'] = $like;
            $params['q3'] = $like;
            $params['q4'] = $like;
            $params['q5'] = $like;
            $params['q6'] = $like;
        }
        if (!empty($filters['team_id'])) {
            $where[] = 'm.team_id = :team_id';
            $params['team_id'] = (int) $filters['team_id'];
        }
        if (!empty($filters['district'])) {
            $where[] = 'm.district = :district';
            $params['district'] = $filters['district'];
        }
        if (!empty($filters['assembly'])) {
            $where[] = 'm.assembly = :assembly';
            $params['assembly'] = $filters['assembly'];
        }
        if (!empty($filters['position'])) {
            $where[] = 'm.position = :position';
            $params['position'] = $filters['position'];
        }
        if (isset($filters['status']) && $filters['status'] !== '') {
            $where[] = 'm.status = :status';
            $params['status'] = (int) $filters['status'];
        } else {
            $where[] = 'm.status = 1';
        }

        $whereSql = implode(' AND ', $where);
        $page = max(1, $page);
        $offset = ($page - 1) * $perPage;

        $countRow = $this->queryOne(
            "SELECT COUNT(*) AS cnt FROM organization_members m WHERE {$whereSql}",
            $params
        );
        $total = (int) ($countRow['cnt'] ?? 0);

        $rows = $this->query(
            "SELECT m.*, t.name AS team_name, t.slug AS team_slug
             FROM organization_members m
             INNER JOIN organization_teams t ON t.id = m.team_id
             WHERE {$whereSql}
             ORDER BY m.sort_order ASC, m.id DESC
             LIMIT {$perPage} OFFSET {$offset}",
            $params
        );

        return [
            'data' => $rows,
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => (int) max(1, ceil($total / $perPage)),
        ];
    }

    public function related(int $memberId, int $teamId, int $limit = 4): array
    {
        return $this->query(
            'SELECT * FROM organization_members
             WHERE team_id = :tid AND id != :id AND status = 1
             ORDER BY sort_order ASC, id ASC
             LIMIT ' . (int) $limit,
            ['tid' => $teamId, 'id' => $memberId]
        );
    }

    public function distinctValues(string $column): array
    {
        $allowed = ['district', 'assembly', 'position', 'state', 'zone'];
        if (!in_array($column, $allowed, true)) {
            return [];
        }
        $rows = $this->query(
            "SELECT DISTINCT `{$column}` AS val FROM organization_members
             WHERE `{$column}` IS NOT NULL AND `{$column}` != '' AND status = 1
             ORDER BY val ASC"
        );
        return array_column($rows, 'val');
    }

    public function reorder(array $orderedIds): void
    {
        foreach ($orderedIds as $index => $id) {
            $this->update((int) $id, ['sort_order' => $index + 1]);
        }
    }

    public function bulkStatus(array $ids, int $status): int
    {
        if (empty($ids)) {
            return 0;
        }
        $ids = array_map('intval', $ids);
        $in = implode(',', $ids);
        return $this->db()->query(
            "UPDATE organization_members SET status = :st, updated_at = NOW() WHERE id IN ({$in})",
            ['st' => $status]
        )->rowCount();
    }

    public function bulkDelete(array $ids): int
    {
        if (empty($ids)) {
            return 0;
        }
        $ids = array_map('intval', $ids);
        $in = implode(',', $ids);
        return $this->db()->query("DELETE FROM organization_members WHERE id IN ({$in})")->rowCount();
    }

    /** Fields allowed for API mass-assignment updates. */
    public function fillablePublic(): array
    {
        return $this->fillable;
    }
}
