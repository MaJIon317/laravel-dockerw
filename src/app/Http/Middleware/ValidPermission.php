<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard): Response
    {
        // Проверяем доступы на просмотр
        $permission = Auth::guard($guard)->user()->role->permission;
         
        if (isset($permission->assets) && !in_array($request->route()->getName(), $permission->assets) && !in_array($request->route()->getName(), config('admin.route_exclude'))) {
            abort(403, 'You don\'t have access to view');
        }

        return $next($request);
    }
}
