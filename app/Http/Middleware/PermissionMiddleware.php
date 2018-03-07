<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class PermissionMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if ($request->is('empresas')) {
            if (!Auth::user()->can('index empresas')) {
                abort('401');
            }
        }

        if ($request->is('empresas/create')) {
            if (!Auth::user()->can('create empresas')) {
                abort('401');
            }
        }

        if ($request->is('empresas/*/edit')) {
            if (!Auth::user()->can('edit empresas')) {
                abort('401');
            }
        }

        return $next($request);
    }
}