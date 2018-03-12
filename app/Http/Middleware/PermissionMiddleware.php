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

        if ($request->is('empresas/seleccionar') ||
            $request->is('empresas/session')) {
            return $next($request);
        }

        if ($request->is('empresas/*/edit')) {
            $verify = Auth::user()->can('editar empresas');
            if (!$verify) {
                abort('401');
            }else{
                return $next($request);
            }
        }


        if ($request->is('empresas/create')) {
            if (!Auth::user()->can('crear empresas')) {
                abort('401');
            }
        }


        if ($request->is('empresas') ||
            $request->is('empresas/sucursales/*') ||
            $request->is('empresas/*')
        ) {

            $verify = Auth::user()->can('ver empresas');
            if (!$verify) {
                abort('401');
            }else{
                return $next($request);
            }
        }


        return $next($request);
    }
}