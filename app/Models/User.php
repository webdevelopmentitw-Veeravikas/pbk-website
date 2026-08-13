<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected string $table = 'users';

    protected array $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'avatar',
        'phone',
        'bio',
        'status',
        'reset_token',
        'reset_expires_at',
        'last_login_at',
        'last_login_ip',
    ];

    public function findByEmail(string $email): ?array
    {
        return $this->findBy('email', $email);
    }

    public function withRole(int $id): ?array
    {
        return $this->queryOne(
            'SELECT u.*, r.name AS role_name, r.slug AS role_slug, r.description AS role_description
             FROM `users` u
             INNER JOIN `roles` r ON r.id = u.role_id
             WHERE u.id = :id
             LIMIT 1',
            ['id' => $id]
        );
    }

    public function allWithRoles(): array
    {
        return $this->query(
            'SELECT u.*, r.name AS role_name, r.slug AS role_slug
             FROM `users` u
             INNER JOIN `roles` r ON r.id = u.role_id
             ORDER BY u.id DESC'
        );
    }

    public function findWithPermissions(int $id): ?array
    {
        $user = $this->withRole($id);
        if (!$user) {
            return null;
        }

        $rows = $this->query(
            'SELECT p.slug
             FROM `permissions` p
             INNER JOIN `role_permissions` rp ON rp.permission_id = p.id
             WHERE rp.role_id = :role_id
             ORDER BY p.slug ASC',
            ['role_id' => $user['role_id']]
        );

        $user['permissions'] = array_column($rows, 'slug');
        unset($user['password']);

        return $user;
    }
}
