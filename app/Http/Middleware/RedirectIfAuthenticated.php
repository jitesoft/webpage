<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Admin\AdminController;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        /*if (Auth::guard($guard)->user() == null) {
            return redirect()->action(AdminController::class . "@getIndex");
        }*/

        return $next($request);
    }
}
