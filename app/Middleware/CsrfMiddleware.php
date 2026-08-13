<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Auth;
use App\Core\Csrf;
use App\Core\Request;
use App\Core\Response;

final class CsrfMiddleware
{
    public function handle(Request $request, ?string $arg = null): void
    {
        if (!in_array($request->method(), ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
            return;
        }

        $token = $request->post(config('app.csrf_token_name', '_csrf_token'))
            ?? $request->header('X-CSRF-TOKEN')
            ?? ($request->json()[config('app.csrf_token_name', '_csrf_token')] ?? null);

        if (!Csrf::verify($token ? (string) $token : null)) {
            if ($request->isAjax()) {
                Response::json(['success' => false, 'message' => 'Invalid CSRF token'], 419);
            }
            Response::abort(419, 'Invalid CSRF token');
        }
    }
}
