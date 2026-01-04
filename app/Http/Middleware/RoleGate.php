<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleGate
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $user = Auth::user();

       
        if (!$user->hasAnyRole($roles)) {
            abort(403, 'You do not have permission.');
        }

        return $next($request);
    }
}
