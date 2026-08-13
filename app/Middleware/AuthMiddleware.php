<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Core\Session;

final class AuthMiddleware
{
    public function handle(Request $request, ?string $arg = null): void
    {
        if (!Auth::check()) {
            Session::flash('alert', ['type' => 'warning', 'message' => 'Please login to continue.']);
            Response::redirect('/admin/login');
        }
    }
}
