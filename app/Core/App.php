<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Application bootstrapper.
 */
final class App
{
    private Router $router;
    private array $config;

    public function __construct()
    {
        $this->config = require CONFIG_PATH . '/app.php';
        date_default_timezone_set($this->config['timezone'] ?? 'UTC');

        if ($this->config['debug'] ?? false) {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            ini_set('display_errors', '0');
        }

        Session::start($this->config);
        $this->router = new Router();
    }

    public function router(): Router
    {
        return $this->router;
    }

    public function run(): void
    {
        // Track visitor (simple)
        $this->trackVisitor();

        $request = new Request();
        $this->router->dispatch($request);
    }

    private function trackVisitor(): void
    {
        try {
            $req = new Request();
            $path = $req->path();
            if (str_starts_with($path, '/admin') || str_starts_with($path, '/api')) {
                return;
            }
            $db = Database::getInstance();
            $db->query(
                "INSERT INTO visitors (ip_address, user_agent, path, visited_at) VALUES (:ip, :ua, :path, NOW())",
                [
                    'ip'   => $req->ip(),
                    'ua'   => mb_substr($req->userAgent(), 0, 255),
                    'path' => mb_substr($path, 0, 255),
                ]
            );
        } catch (\Throwable) {
            // Ignore if table missing during install
        }
    }
}
