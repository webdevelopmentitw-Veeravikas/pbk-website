<?php

declare(strict_types=1);

namespace App\Core;

use App\Models\User;
use App\Models\ActivityLog;

/**
 * Authentication & authorization service.
 */
final class Auth
{
    public static function attempt(string $email, string $password, bool $remember = false): bool
    {
        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user || (int) $user['status'] !== 1) {
            return false;
        }

        if (!password_verify($password, $user['password'])) {
            return false;
        }

        $full = $userModel->findWithPermissions((int) $user['id']);
        self::login($full ?: $user);

        $userModel->update((int) $user['id'], [
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => (new Request())->ip(),
        ]);

        ActivityLog::record((int) $user['id'], 'login', 'User logged in');

        return true;
    }

    public static function login(array $user): void
    {
        Session::regenerate();
        unset($user['password']);
        Session::set('auth_user', $user);
        Session::set('auth_user_id', (int) $user['id']);
    }

    public static function logout(): void
    {
        $id = self::id();
        if ($id) {
            ActivityLog::record($id, 'logout', 'User logged out');
        }
        Session::forget('auth_user');
        Session::forget('auth_user_id');
        Session::regenerate();
    }

    public static function check(): bool
    {
        return Session::has('auth_user_id');
    }

    public static function guest(): bool
    {
        return !self::check();
    }

    public static function user(): ?array
    {
        if (!self::check()) {
            return null;
        }
        $cached = Session::get('auth_user');
        if ($cached) {
            return $cached;
        }
        $user = (new User())->find((int) Session::get('auth_user_id'));
        if ($user) {
            unset($user['password']);
            Session::set('auth_user', $user);
        }
        return $user;
    }

    public static function id(): ?int
    {
        $id = Session::get('auth_user_id');
        return $id ? (int) $id : null;
    }

    public static function role(): ?string
    {
        $user = self::user();
        return $user['role_slug'] ?? $user['role'] ?? null;
    }

    public static function isSuperAdmin(): bool
    {
        return self::role() === 'super_admin';
    }

    public static function isAdmin(): bool
    {
        return in_array(self::role(), ['super_admin', 'admin'], true);
    }

    public static function can(string $permission): bool
    {
        if (self::isSuperAdmin()) {
            return true;
        }
        $user = self::user();
        if (!$user) {
            return false;
        }
        $perms = $user['permissions'] ?? [];
        if (is_string($perms)) {
            $perms = json_decode($perms, true) ?: [];
        }
        return in_array($permission, $perms, true) || in_array('*', $perms, true);
    }

    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }
}
