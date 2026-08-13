<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;

final class PermissionMiddleware
{
    public function handle(Request $request, ?string $arg = null): void
    {
        if (!$arg) {
            return;
        }
        if (!Auth::can($arg)) {
            if ($request->isAjax()) {
                Response::json(['success' => false, 'message' => 'Permission denied'], 403);
            }
            Response::abort(403, 'You do not have permission to perform this action.');
        }
    }
}
