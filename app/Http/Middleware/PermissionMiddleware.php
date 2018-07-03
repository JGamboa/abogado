<?php
namespace App\Http\Middleware;
use Closure;
use Auth;
use Route;

class PermissionMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $route = Route::currentRouteName();

        /****************************** EMPRESAS *******************************/

        if($route == "empresas.index" || $route == "empresas.show"){
            if (!Auth::user()->can('ver empresas')) {
                abort('401');
            }
        }

        if($route == "empresas.create"){
            if (!Auth::user()->can('crear empresas')) {
                abort('401');
            }
        }

        if($route == "empresas.edit"){
            if (!Auth::user()->can('editar empresas')) {
                abort('401');
            }
        }

        if($route == "empresas.destroy"){
            if (!Auth::user()->can('borrar empresas')) {
                abort('401');
            }
        }

        if($route == "empresas.showSucursales"){
            if (!Auth::user()->can('ver sucursales')) {
                abort('401');
            }
        }

        /****************************** EMPRESAS *******************************/

        /****************************** SUCURSALES *******************************/

        if($route == "sucursales.index" || $route == "sucursales.show"){
            if (!Auth::user()->can('ver sucursales')) {
                abort('401');
            }
        }

        if($route == "sucursales.create"){
            if (!Auth::user()->can('crear sucursales')) {
                abort('401');
            }
        }

        if($route == "sucursales.edit"){
            if (!Auth::user()->can('editar sucursales')) {
                abort('401');
            }
        }

        if($route == "sucursales.destroy"){
            if (!Auth::user()->can('borrar sucursales')) {
                abort('401');
            }
        }

        /****************************** SUCURSALES *******************************/


        /****************************** CASOS *******************************/

        if($route == "casos.index" || $route == "casos.show" || $route == "casos.edit"){
            if (!Auth::user()->can('ver casos')) {
                abort('401');
            }
        }

        if($route == "casos.create"){
            if (!Auth::user()->can('crear casos')) {
                abort('401');
            }
        }

        if($route == "casos.editar-en-linea" || $route == "casos.update"){
            if (!Auth::user()->can('editar casos')) {
                abort('401');
            }
        }

        if($route == "casos.subir-archivos"){
            if (!Auth::user()->can('subir archivos casos')) {
                abort('401');
            }
        }

        if($route == "casos.listar-archivos" || $route == "casos.ver-archivos"){
            if (!Auth::user()->can('ver archivos casos')) {
                abort('401');
            }
        }


        if($route == "casos.destroy"){
            if (!Auth::user()->can('borrar casos')) {
                abort('401');
            }
        }

        if($route == "casos.reporte"){
            if (!Auth::user()->can('ver reporte casos')) {
                abort('401');
            }
        }

        if($route == "api.observacionesCasos.create"){
            if (!Auth::user()->can('comentar casos')) {
                abort('401');
            }
        }


        /****************************** CASOS *******************************/

        /****************************** INTERVINIENTES *******************************/

        if($route == "intervinientes.index" || $route == "intervinientes.show"){
            if (!Auth::user()->can('ver intervinientes')) {
                abort('401');
            }
        }

        if($route == "intervinientes.create"){
            if (!Auth::user()->can('crear intervinientes')) {
                abort('401');
            }
        }

        if($route == "intervinientes.edit"){
            if (!Auth::user()->can('editar intervinientes')) {
                abort('401');
            }
        }

        if($route == "intervinientes.destroy"){
            if (!Auth::user()->can('borrar intervinientes')) {
                abort('401');
            }
        }

        /****************************** INTERVINIENTES *******************************/

        /****************************** ISAPRES *******************************/

        if($route == "isapres.index" || $route == "isapres.show"){
            if (!Auth::user()->can('ver isapres')) {
                abort('401');
            }
        }

        if($route == "isapres.create"){
            if (!Auth::user()->can('crear isapres')) {
                abort('401');
            }
        }

        if($route == "isapres.edit"){
            if (!Auth::user()->can('editar isapres')) {
                abort('401');
            }
        }

        if($route == "isapres.destroy"){
            if (!Auth::user()->can('borrar isapres')) {
                abort('401');
            }
        }

        /****************************** ISAPRES *******************************/

        /****************************** CORTES *******************************/

        if($route == "cortes.index" || $route == "cortes.show"){
            if (!Auth::user()->can('ver cortes')) {
                abort('401');
            }
        }

        if($route == "cortes.create"){
            if (!Auth::user()->can('crear cortes')) {
                abort('401');
            }
        }

        if($route == "cortes.edit"){
            if (!Auth::user()->can('editar cortes')) {
                abort('401');
            }
        }

        if($route == "cortes.destroy"){
            if (!Auth::user()->can('borrar cortes')) {
                abort('401');
            }
        }

        /****************************** CORTES *******************************/

        /****************************** MATERIAS *******************************/

        if($route == "materias.index" || $route == "materias.show"){
            if (!Auth::user()->can('ver materias')) {
                abort('401');
            }
        }

        if($route == "materias.create"){
            if (!Auth::user()->can('crear materias')) {
                abort('401');
            }
        }

        if($route == "materias.edit"){
            if (!Auth::user()->can('editar materias')) {
                abort('401');
            }
        }

        if($route == "materias.destroy"){
            if (!Auth::user()->can('borrar materias')) {
                abort('401');
            }
        }

        /****************************** MATERIAS *******************************/

        /****************************** ESTADOS CASOS *******************************/

        if($route == "estadoscasos.index" || $route == "estadoscasos.show"){
            if (!Auth::user()->can('ver estados casos')) {
                abort('401');
            }
        }

        if($route == "estadoscasos.create"){
            if (!Auth::user()->can('crear estados casos')) {
                abort('401');
            }
        }

        if($route == "estadoscasos.edit"){
            if (!Auth::user()->can('editar estados casos')) {
                abort('401');
            }
        }

        if($route == "estadoscasos.destroy"){
            if (!Auth::user()->can('borrar estados casos')) {
                abort('401');
            }
        }

        /****************************** ESTADOS CASOS *******************************/

        /****************************** ESTADOS MATERIAS *******************************/

        if($route == "estadosMaterias.index" || $route == "estadosMaterias.show"){
            if (!Auth::user()->can('ver estados materias')) {
                abort('401');
            }
        }

        if($route == "estadosMaterias.create"){
            if (!Auth::user()->can('crear estados materias')) {
                abort('401');
            }
        }

        if($route == "estadosMaterias.edit"){
            if (!Auth::user()->can('editar estados materias')) {
                abort('401');
            }
        }

        if($route == "estadosMaterias.destroy"){
            if (!Auth::user()->can('borrar estados materias')) {
                abort('401');
            }
        }

        /****************************** ESTADOS MATERIAS *******************************/


        /****************************** LOCALIDADES *******************************/

        /* PARA LO RELACIONADO A PAISES, REGION, COMUNA, PROVINCIA */

        if($route == "pais.index" || $route == "pais.show" ||
           $route == "regiones.index" || $route == "regiones.show" ||
           $route == "provincias.index" || $route == "provincias.show" ||
           $route == "comunas.index" || $route == "comunas.show"){
            if (!Auth::user()->can('ver localidades')) {
                abort('401');
            }
        }

        if($route == "pais.create" ||
           $route == "regiones.create" ||
           $route == "provincias.create" ||
           $route == "comunas.create"){
            if (!Auth::user()->can('crear localidades')) {
                abort('401');
            }
        }

        if($route == "pais.edit" ||
            $route == "regiones.edit" ||
            $route == "provincias.edit" ||
            $route == "comunas.edit"){
            if (!Auth::user()->can('editar localidades')) {
                abort('401');
            }
        }

        if($route == "pais.destroy" ||
            $route == "regiones.destroy" ||
            $route == "provincias.destroy" ||
            $route == "comunas.destroy"){
            if (!Auth::user()->can('borrar localidades')) {
                abort('401');
            }
        }

        /****************************** LOCALIDADES *******************************/
        return $next($request);
    }
}