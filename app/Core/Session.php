<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Secure session management.
 */
final class Session
{
    private static bool $started = false;

    public static function start(array $config = []): void
    {
        if (self::$started || session_status() === PHP_SESSION_ACTIVE) {
            self::$started = true;
            return;
        }

        $name = $config['session_name'] ?? 'CMSSESSID';
        $lifetime = (int) ($config['session_lifetime'] ?? 7200);

        // Always use "/" so CSRF sessions work on live root domains
        // even if BASE_PATH was wrongly left as "/p".
        $cookiePath = '/';

        session_name($name);
        session_set_cookie_params([
            'lifetime' => $lifetime,
            'path'     => $cookiePath,
            'secure'   => self::isHttps(),
            'httponly' => true,
            'samesite' => 'Lax',
        ]);

        // Prefer project storage so shared hosts keep a writable session dir.
        $savePath = STORAGE_PATH . '/sessions';
        if (!is_dir($savePath)) {
            @mkdir($savePath, 0755, true);
        }
        if (is_dir($savePath) && is_writable($savePath)) {
            session_save_path($savePath);
        }

        session_start();
        self::$started = true;

        if (!isset($_SESSION['_created'])) {
            $_SESSION['_created'] = time();
        } elseif (time() - ($_SESSION['_created'] ?? 0) > $lifetime) {
            self::regenerate();
            $_SESSION['_created'] = time();
        }
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function forget(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function flash(string $key, mixed $value = null): mixed
    {
        if ($value !== null) {
            $_SESSION['_flash'][$key] = $value;
            return null;
        }
        $val = $_SESSION['_flash'][$key] ?? null;
        unset($_SESSION['_flash'][$key]);
        return $val;
    }

    public static function regenerate(): void
    {
        session_regenerate_id(true);
    }

    public static function destroy(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'] ?? '', $params['secure'], $params['httponly']);
        }
        session_destroy();
        self::$started = false;
    }

    public static function all(): array
    {
        return $_SESSION;
    }

    public static function isHttps(): bool
    {
        if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
            return true;
        }
        if ((string) ($_SERVER['SERVER_PORT'] ?? '') === '443') {
            return true;
        }
        $forwarded = strtolower((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? ''));
        if ($forwarded === 'https') {
            return true;
        }
        return strtolower((string) ($_SERVER['REQUEST_SCHEME'] ?? '')) === 'https';
    }
}
