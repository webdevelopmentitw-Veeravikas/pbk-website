<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Active-record style base model using PDO.
 */
abstract class Model
{
    protected Database $db;
    protected string $table = '';
    protected string $primaryKey = 'id';
    protected array $fillable = [];
    protected bool $timestamps = true;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all(string $orderBy = 'id DESC'): array
    {
        return $this->db->fetchAll("SELECT * FROM `{$this->table}` ORDER BY {$orderBy}");
    }

    public function find(int $id): ?array
    {
        return $this->db->fetch(
            "SELECT * FROM `{$this->table}` WHERE `{$this->primaryKey}` = :id LIMIT 1",
            ['id' => $id]
        );
    }

    public function findBy(string $column, mixed $value): ?array
    {
        return $this->db->fetch(
            "SELECT * FROM `{$this->table}` WHERE `{$column}` = :val LIMIT 1",
            ['val' => $value]
        );
    }

    public function where(string $where, array $params = [], string $orderBy = 'id DESC'): array
    {
        return $this->db->fetchAll(
            "SELECT * FROM `{$this->table}` WHERE {$where} ORDER BY {$orderBy}",
            $params
        );
    }

    public function create(array $data): int
    {
        $data = $this->filterFillable($data);
        if ($this->timestamps) {
            $now = date('Y-m-d H:i:s');
            $data['created_at'] = $data['created_at'] ?? $now;
            $data['updated_at'] = $data['updated_at'] ?? $now;
        }
        return $this->db->insert($this->table, $data);
    }

    public function update(int $id, array $data): int
    {
        $data = $this->filterFillable($data);
        if ($this->timestamps) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
        return $this->db->update($this->table, $data, "`{$this->primaryKey}` = :_id", ['_id' => $id]);
    }

    public function delete(int $id): int
    {
        return $this->db->delete($this->table, "`{$this->primaryKey}` = :id", ['id' => $id]);
    }

    public function count(string $where = '1=1', array $params = []): int
    {
        return $this->db->count($this->table, $where, $params);
    }

    public function paginate(int $page = 1, int $perPage = 15, string $where = '1=1', array $params = [], string $orderBy = 'id DESC'): array
    {
        $page = max(1, $page);
        $total = $this->count($where, $params);
        $offset = ($page - 1) * $perPage;
        $rows = $this->db->fetchAll(
            "SELECT * FROM `{$this->table}` WHERE {$where} ORDER BY {$orderBy} LIMIT {$perPage} OFFSET {$offset}",
            $params
        );

        return [
            'data'         => $rows,
            'total'        => $total,
            'per_page'     => $perPage,
            'current_page' => $page,
            'last_page'    => (int) max(1, ceil($total / $perPage)),
        ];
    }

    public function query(string $sql, array $params = []): array
    {
        return $this->db->fetchAll($sql, $params);
    }

    public function queryOne(string $sql, array $params = []): ?array
    {
        return $this->db->fetch($sql, $params);
    }

    protected function filterFillable(array $data): array
    {
        if (empty($this->fillable)) {
            return $data;
        }
        return array_intersect_key($data, array_flip($this->fillable));
    }

    public function db(): Database
    {
        return $this->db;
    }
}
