<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Simple request wrapper.
 */
final class Request
{
    private array $get;
    private array $post;
    private array $server;
    private array $files;
    private ?array $json = null;

    public function __construct()
    {
        $this->get    = $_GET;
        $this->post   = $_POST;
        $this->server = $_SERVER;
        $this->files  = $_FILES;
    }

    public function method(): string
    {
        return strtoupper($this->server['REQUEST_METHOD'] ?? 'GET');
    }

    public function isPost(): bool
    {
        return $this->method() === 'POST';
    }

    public function isAjax(): bool
    {
        return strtolower($this->server['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest'
            || str_contains($this->header('Accept', ''), 'application/json');
    }

    public function uri(): string
    {
        $uri = parse_url($this->server['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $base = rtrim(BASE_PATH, '/');
        if ($base !== '' && str_starts_with($uri, $base)) {
            $uri = substr($uri, strlen($base)) ?: '/';
        }
        return '/' . trim($uri, '/');
    }

    public function path(): string
    {
        $uri = $this->uri();
        return $uri === '/' ? '/' : rtrim($uri, '/');
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->get[$key] ?? $default;
    }

    public function post(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        if (array_key_exists($key, $this->post) || array_key_exists($key, $this->get)) {
            return true;
        }
        // Only peek into JSON body for API payloads
        if (str_contains((string) $this->header('Content-Type', ''), 'application/json')) {
            return array_key_exists($key, $this->json());
        }
        return false;
    }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function all(): array
    {
        return array_merge($this->get, $this->post);
    }

    public function only(array $keys): array
    {
        $out = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $this->post) || array_key_exists($key, $this->get)) {
                $out[$key] = $this->input($key);
            }
        }
        return $out;
    }

    public function file(string $key): ?array
    {
        return $this->files[$key] ?? null;
    }

    public function files(string $key): array
    {
        $file = $this->files[$key] ?? null;
        if (!$file) {
            return [];
        }
        if (!is_array($file['name'])) {
            return [$file];
        }
        $list = [];
        foreach ($file['name'] as $i => $name) {
            $list[] = [
                'name'     => $file['name'][$i],
                'type'     => $file['type'][$i],
                'tmp_name' => $file['tmp_name'][$i],
                'error'    => $file['error'][$i],
                'size'     => $file['size'][$i],
            ];
        }
        return $list;
    }

    public function header(string $name, mixed $default = null): mixed
    {
        $key = 'HTTP_' . strtoupper(str_replace('-', '_', $name));
        return $this->server[$key] ?? $default;
    }

    public function ip(): string
    {
        return $this->server['HTTP_X_FORWARDED_FOR']
            ?? $this->server['REMOTE_ADDR']
            ?? '0.0.0.0';
    }

    public function userAgent(): string
    {
        return $this->server['HTTP_USER_AGENT'] ?? '';
    }

    public function json(): array
    {
        if ($this->json === null) {
            $raw = file_get_contents('php://input') ?: '';
            $decoded = json_decode($raw, true);
            $this->json = is_array($decoded) ? $decoded : [];
        }
        return $this->json;
    }

    public function bearerToken(): ?string
    {
        $auth = $this->header('Authorization', '');
        if (preg_match('/Bearer\s+(\S+)/i', (string) $auth, $m)) {
            return $m[1];
        }
        return null;
    }
}
