<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
class EmployeeAdminVerified
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('employee')->check()) {
            return redirect()->guest('/admin/login');
        }
        return $next($request);
    }
}
