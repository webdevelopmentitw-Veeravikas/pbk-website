<?php

declare(strict_types=1);

namespace App\Core;

/**
 * CSRF token generation & verification.
 */
final class Csrf
{
    public static function token(): string
    {
        $name = config('app.csrf_token_name', '_csrf_token');
        if (!Session::has($name)) {
            Session::set($name, bin2hex(random_bytes(32)));
        }
        return (string) Session::get($name);
    }

    public static function field(): string
    {
        $name = config('app.csrf_token_name', '_csrf_token');
        $token = self::token();
        return '<input type="hidden" name="' . e($name) . '" value="' . e($token) . '">';
    }

    public static function meta(): string
    {
        return '<meta name="csrf-token" content="' . e(self::token()) . '">';
    }

    public static function verify(?string $token): bool
    {
        $name = config('app.csrf_token_name', '_csrf_token');
        $sessionToken = Session::get($name);
        if (!$sessionToken || !$token) {
            return false;
        }
        return hash_equals((string) $sessionToken, $token);
    }
}
