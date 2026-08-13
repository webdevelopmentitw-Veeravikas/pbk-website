<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;

final class AdminMiddleware
{
    public function handle(Request $request, ?string $arg = null): void
    {
        if (!Auth::check()) {
            Response::redirect('/admin/login');
        }
        $role = Auth::role();
        if (!in_array($role, ['super_admin', 'admin', 'editor'], true)) {
            Response::abort(403, 'Access denied');
        }
    }
}
