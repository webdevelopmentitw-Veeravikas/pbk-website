<?php

declare(strict_types=1);

namespace App\Core;

/**
 * HTTP response helpers.
 */
final class Response
{
    public static function html(string $content, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: text/html; charset=UTF-8');
        echo $content;
        exit;
    }

    public static function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    public static function redirect(string $url, int $status = 302): void
    {
        if (!str_starts_with($url, 'http')) {
            $url = url($url);
        }
        http_response_code($status);
        header('Location: ' . $url);
        exit;
    }

    public static function download(string $path, ?string $filename = null): void
    {
        if (!is_file($path)) {
            http_response_code(404);
            exit('File not found');
        }
        $filename = $filename ?: basename($path);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($path));
        readfile($path);
        exit;
    }

    public static function abort(int $status, string $message = ''): void
    {
        http_response_code($status);
        $isAjax = strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest'
            || str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json');
        if ($isAjax) {
            self::json(['success' => false, 'message' => $message ?: 'Error'], $status);
        }
        $view = VIEW_PATH . '/errors/' . $status . '.php';
        if (is_file($view)) {
            require $view;
        } else {
            echo htmlspecialchars($message ?: "HTTP {$status}");
        }
        exit;
    }
}
