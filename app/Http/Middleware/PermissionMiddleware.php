<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $permission): Response
    {
        if (! $request->user() || ! $request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
