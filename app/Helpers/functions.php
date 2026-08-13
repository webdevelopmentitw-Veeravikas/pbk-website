<?php

declare(strict_types=1);

/**
 * Global helper functions
 */

use App\Core\Session;
use App\Core\Csrf;
use App\Core\Auth;
use App\Core\View;
use App\Core\Database;

if (!function_exists('config')) {
    function config(string $key, mixed $default = null): mixed
    {
        static $cache = [];
        [$file, $item] = array_pad(explode('.', $key, 2), 2, null);
        if (!isset($cache[$file])) {
            $path = CONFIG_PATH . '/' . $file . '.php';
            $cache[$file] = is_file($path) ? require $path : [];
        }
        if ($item === null) {
            return $cache[$file] ?: $default;
        }
        return $cache[$file][$item] ?? $default;
    }
}

if (!function_exists('env_setting')) {
    function env_setting(string $key, mixed $default = null): mixed
    {
        static $settings = null;
        if ($settings === null) {
            try {
                $rows = Database::getInstance()->fetchAll('SELECT `key`, `value` FROM settings');
                $settings = [];
                foreach ($rows as $r) {
                    $settings[$r['key']] = $r['value'];
                }
            } catch (\Throwable) {
                $settings = [];
            }
        }
        return $settings[$key] ?? $default;
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        $base = rtrim((string) config('app.url', ''), '/');
        $path = '/' . ltrim($path, '/');
        if ($path === '/') {
            return $base . '/';
        }
        return $base . $path;
    }
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return url('public/' . ltrim($path, '/'));
    }
}

if (!function_exists('e')) {
    /**
     * Escape a value for HTML output.
     * Arrays (e.g. validation errors) use the first element.
     */
    function e(mixed $value): string
    {
        if (is_array($value)) {
            $value = $value[0] ?? '';
        }
        if ($value !== null && !is_scalar($value)) {
            $value = '';
        }

        return View::e($value === null ? null : (string) $value);
    }
}

if (!function_exists('old')) {
    function old(string $key, mixed $default = ''): mixed
    {
        $old = Session::flash('old') ?? Session::get('_old_input');
        if (is_array($old) && array_key_exists($key, $old)) {
            return $old[$key];
        }
        return $default;
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return Csrf::field();
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        return Csrf::token();
    }
}

if (!function_exists('auth')) {
    function auth(): Auth
    {
        return new Auth();
    }
}

if (!function_exists('user')) {
    function user(): ?array
    {
        return Auth::user();
    }
}

if (!function_exists('slugify')) {
    function slugify(string $text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text) ?? '';
        $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text) ?: $text;
        $text = preg_replace('~[^-\w]+~', '', $text) ?? '';
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text) ?? '';
        $text = strtolower($text);
        return $text !== '' ? $text : 'n-a-' . bin2hex(random_bytes(3));
    }
}

if (!function_exists('str_limit')) {
    function str_limit(?string $text, int $limit = 100, string $end = '...'): string
    {
        $text = strip_tags((string) $text);
        if (mb_strlen($text) <= $limit) {
            return $text;
        }
        return mb_substr($text, 0, $limit) . $end;
    }
}

if (!function_exists('format_date')) {
    function format_date(?string $date, string $format = 'd M Y'): string
    {
        if (!$date) {
            return '';
        }
        return date($format, strtotime($date));
    }
}

if (!function_exists('active_menu')) {
    function active_menu(string $path): string
    {
        $current = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
        $check = rtrim(BASE_PATH . '/' . ltrim($path, '/'), '/');
        return str_starts_with(rtrim($current, '/'), $check) ? 'active' : '';
    }
}

if (!function_exists('logger')) {
    function logger(string $channel, string $message, array $context = []): void
    {
        $dir = STORAGE_PATH . '/logs';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $line = sprintf(
            "[%s] %s %s %s\n",
            date('Y-m-d H:i:s'),
            strtoupper($channel),
            $message,
            $context ? json_encode($context, JSON_UNESCAPED_UNICODE) : ''
        );
        file_put_contents($dir . '/' . date('Y-m-d') . '.log', $line, FILE_APPEND);
    }
}

if (!function_exists('storage_path')) {
    function storage_path(string $path = ''): string
    {
        return STORAGE_PATH . ($path ? '/' . ltrim($path, '/') : '');
    }
}

if (!function_exists('upload_url')) {
    function upload_url(?string $path): string
    {
        if (!$path) {
            return asset('assets/images/logo.png');
        }
        if (str_starts_with($path, 'http')) {
            return $path;
        }
        return asset(ltrim($path, '/'));
    }
}

if (!function_exists('paginate_links')) {
    function paginate_links(array $paginator, string $baseUrl): string
    {
        $current = (int) $paginator['current_page'];
        $last = (int) $paginator['last_page'];
        if ($last <= 1) {
            return '';
        }
        $html = '<nav class="pagination"><ul class="pagination mb-0">';
        for ($i = 1; $i <= $last; $i++) {
            $active = $i === $current ? ' active' : '';
            $sep = str_contains($baseUrl, '?') ? '&' : '?';
            $html .= '<li class="page-item' . $active . '"><a class="page-link" href="' . e($baseUrl . $sep . 'page=' . $i) . '">' . $i . '</a></li>';
        }
        $html .= '</ul></nav>';
        return $html;
    }
}

if (!function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        return env_setting($key, $default);
    }
}

if (!function_exists('redirect')) {
    function redirect(string $path): never
    {
        \App\Core\Response::redirect($path);
    }
}

if (!function_exists('abort')) {
    function abort(int $code, string $message = ''): never
    {
        \App\Core\Response::abort($code, $message);
    }
}

if (!function_exists('method_field')) {
    function method_field(string $method): string
    {
        return '<input type="hidden" name="_method" value="' . e(strtoupper($method)) . '">';
    }
}

if (!function_exists('is_dark_mode')) {
    function is_dark_mode(): bool
    {
        return ($_COOKIE['cms_theme'] ?? 'light') === 'dark';
    }
}
