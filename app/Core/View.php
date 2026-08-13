<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Lightweight view renderer with layouts and sections.
 */
final class View
{
    private static array $sections = [];
    private static ?string $currentSection = null;

    public static function render(string $path, array $data = [], ?string $layout = null): string
    {
        $file = VIEW_PATH . '/' . str_replace('.', '/', $path) . '.php';
        if (!is_file($file)) {
            throw new \RuntimeException("View [{$path}] not found at {$file}");
        }

        extract($data, EXTR_SKIP);
        ob_start();
        require $file;
        $content = ob_get_clean() ?: '';

        if ($layout) {
            $layoutFile = VIEW_PATH . '/' . str_replace('.', '/', $layout) . '.php';
            if (!is_file($layoutFile)) {
                throw new \RuntimeException("Layout [{$layout}] not found");
            }
            ob_start();
            require $layoutFile;
            return ob_get_clean() ?: '';
        }

        return $content;
    }

    public static function partial(string $path, array $data = []): void
    {
        echo self::render($path, $data);
    }

    public static function startSection(string $name): void
    {
        self::$currentSection = $name;
        ob_start();
    }

    public static function endSection(): void
    {
        if (self::$currentSection) {
            self::$sections[self::$currentSection] = ob_get_clean() ?: '';
            self::$currentSection = null;
        }
    }

    public static function yield(string $name, string $default = ''): string
    {
        return self::$sections[$name] ?? $default;
    }

    public static function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
