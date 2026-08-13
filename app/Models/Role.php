<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class Role extends Model
{
    protected string $table = 'roles';

    protected array $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function withPermissions(int $id): ?array
    {
        $role = $this->find($id);
        if (!$role) {
            return null;
        }

        $permissions = $this->query(
            'SELECT p.*
             FROM `permissions` p
             INNER JOIN `role_permissions` rp ON rp.permission_id = p.id
             WHERE rp.role_id = :role_id
             ORDER BY p.group_name ASC, p.name ASC',
            ['role_id' => $id]
        );

        $role['permissions'] = $permissions;
        $role['permission_ids'] = array_column($permissions, 'id');

        return $role;
    }

    public function syncPermissions(int $roleId, array $permissionIds): void
    {
        $db = $this->db();
        $db->beginTransaction();

        try {
            $db->delete('role_permissions', 'role_id = :role_id', ['role_id' => $roleId]);

            foreach ($permissionIds as $permissionId) {
                $db->insert('role_permissions', [
                    'role_id'       => $roleId,
                    'permission_id' => (int) $permissionId,
                ]);
            }

            $db->commit();
        } catch (\Throwable $e) {
            $db->rollBack();
            throw $e;
        }
    }
}
