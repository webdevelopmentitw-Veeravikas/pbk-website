<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Lightweight router with named middleware support.
 */
final class Router
{
    private array $routes = [];
    private array $groupStack = [];
    private array $named = [];

    public function get(string $uri, array|callable $action, array $middleware = []): self
    {
        return $this->add('GET', $uri, $action, $middleware);
    }

    public function post(string $uri, array|callable $action, array $middleware = []): self
    {
        return $this->add('POST', $uri, $action, $middleware);
    }

    public function put(string $uri, array|callable $action, array $middleware = []): self
    {
        return $this->add('PUT', $uri, $action, $middleware);
    }

    public function delete(string $uri, array|callable $action, array $middleware = []): self
    {
        return $this->add('DELETE', $uri, $action, $middleware);
    }

    public function any(string $uri, array|callable $action, array $middleware = []): self
    {
        foreach (['GET', 'POST', 'PUT', 'DELETE'] as $method) {
            $this->add($method, $uri, $action, $middleware);
        }
        return $this;
    }

    /**
     * @param callable(Router):void $callback
     */
    public function group(array $options, callable $callback): void
    {
        $this->groupStack[] = $options;
        $callback($this);
        array_pop($this->groupStack);
    }

    public function name(string $name): self
    {
        if (!empty($this->routes)) {
            $last = array_key_last($this->routes);
            $this->routes[$last]['name'] = $name;
            $this->named[$name] = $this->routes[$last];
        }
        return $this;
    }

    private function add(string $method, string $uri, array|callable $action, array $middleware = []): self
    {
        $prefix = '';
        $groupMw = [];
        foreach ($this->groupStack as $group) {
            $prefix .= $group['prefix'] ?? '';
            $groupMw = array_merge($groupMw, $group['middleware'] ?? []);
        }

        $uri = '/' . trim($prefix . '/' . trim($uri, '/'), '/');
        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }

        $this->routes[] = [
            'method'     => $method,
            'uri'        => $uri === '' ? '/' : $uri,
            'action'     => $action,
            'middleware' => array_values(array_unique(array_merge($groupMw, $middleware))),
            'name'       => null,
        ];

        return $this;
    }

    public function dispatch(Request $request): void
    {
        $method = $request->method();
        // Support method spoofing for forms
        if ($method === 'POST' && $request->post('_method')) {
            $spoof = strtoupper((string) $request->post('_method'));
            if (in_array($spoof, ['PUT', 'PATCH', 'DELETE'], true)) {
                $method = $spoof;
            }
        }

        $path = $request->path();
        if ($path === '') {
            $path = '/';
        }

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            $pattern = preg_replace('#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#', '([^/]+)', $route['uri']);
            $pattern = '#^' . $pattern . '$#';

            if (!preg_match($pattern, $path, $matches)) {
                continue;
            }

            array_shift($matches);
            $params = $matches;

            foreach ($route['middleware'] as $mw) {
                $this->runMiddleware($mw, $request);
            }

            $this->runAction($route['action'], $params, $request);
            return;
        }

        Response::abort(404, 'Page not found');
    }

    private function runMiddleware(string $name, Request $request): void
    {
        $map = [
            'auth'     => \App\Middleware\AuthMiddleware::class,
            'guest'    => \App\Middleware\GuestMiddleware::class,
            'admin'    => \App\Middleware\AdminMiddleware::class,
            'csrf'     => \App\Middleware\CsrfMiddleware::class,
            'permission' => \App\Middleware\PermissionMiddleware::class,
        ];

        // permission:posts.create style
        $arg = null;
        if (str_contains($name, ':')) {
            [$name, $arg] = explode(':', $name, 2);
        }

        if (!isset($map[$name])) {
            throw new \RuntimeException("Unknown middleware [{$name}]");
        }

        $instance = new $map[$name]();
        $instance->handle($request, $arg);
    }

    private function runAction(array|callable $action, array $params, Request $request): void
    {
        if (is_callable($action) && !is_array($action)) {
            echo call_user_func_array($action, $params);
            return;
        }

        [$class, $method] = $action;
        if (!class_exists($class)) {
            throw new \RuntimeException("Controller {$class} not found");
        }

        $controller = new $class();
        if (!method_exists($controller, $method)) {
            throw new \RuntimeException("Method {$class}@{$method} not found");
        }

        $controller->setRequest($request);
        call_user_func_array([$controller, $method], $params);
    }

    public function routes(): array
    {
        return $this->routes;
    }
}
