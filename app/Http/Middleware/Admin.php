<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!UserRole::isAdmin()) {
            return redirect()->back()->withErrors('Người dùng không có quyền');
        }
        return $next($request);
    }
}
