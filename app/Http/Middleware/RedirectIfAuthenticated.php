<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param \Closure                 $next    Next request
     * @param string|null              $guard   Guard type
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->role_id !== User::ROLE_USER) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
