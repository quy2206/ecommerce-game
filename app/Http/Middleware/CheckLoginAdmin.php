<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check() && !in_array(Route::currentRouteName(), ['admin.login', 'admin.login.handle'])) {
            return redirect()->route('admin.login');
        }

        // check login: if (Login is OK && routeName == ['admin.login', 'admin.login.handle']) then redirect to Dashboard page
        if (Auth::guard('admin')->check() && in_array(Route::currentRouteName(), ['admin.login', 'admin.login.handle'])) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
