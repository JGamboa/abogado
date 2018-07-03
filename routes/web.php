<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', 'InitialController@index')->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/*
//Auth::routes();

Route::get('/home', 'HomeController@index');
*/
Route::group(['middleware' => ['auth', 'has_permission']], function() {

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');


Route::resource('pais', 'PaisController');

Route::get('comunas/{comuna}/restore', 'ComunaController@restore')->name('comunas.restore');
Route::post('comunas/search', 'ComunaController@search')->name('comunas.search');
Route::get('comunas/deleted', 'ComunaController@deleted')->name('comunas.deleted');
Route::resource('comunas', 'ComunaController');


Route::get('provincias/{provincia}/restore', 'ProvinciaController@restore')->name('provincias.restore');
Route::post('provincias/search', 'ProvinciaController@search')->name('provincias.search');
Route::get('provincias/deleted', 'ProvinciaController@deleted')->name('provincias.deleted');
Route::resource('provincias', 'ProvinciaController');


Route::get('regiones/{region}/restore', 'RegionController@restore')->name('regiones.restore');
Route::post('regiones/search', 'RegionController@search')->name('regiones.search');
Route::get('regiones/deleted', 'RegionController@deleted')->name('regiones.deleted');
Route::resource('regiones', 'RegionController');


Route::post('empresas/session', 'EmpresaController@session')->name('empresas.session');
Route::get('empresas/seleccionar', 'EmpresaController@seleccionar')->name('empresas.seleccionar');
Route::get('empresas/sucursales/{empresa}', 'EmpresaController@showSucursales')->name('empresas.showSucursales');
Route::get('empresas/{empresa}/restore', 'EmpresaController@restore')->name('empresas.restore');
Route::post('empresas/search', 'EmpresaController@search')->name('empresas.search');
Route::get('empresas/deleted', 'EmpresaController@deleted')->name('empresas.deleted');
Route::resource('empresas', 'EmpresaController');


Route::get('sucursales/{sucursal}/restore', 'SucursalController@restore')->name('sucursales.restore');
Route::post('sucursales/search', 'SucursalController@search')->name('sucursales.search');
Route::get('sucursales/deleted', 'SucursalController@deleted')->name('sucursales.deleted');
Route::resource('sucursales', 'SucursalController');


Route::patch('empleados/{empleado}/permisos', 'EmpleadoController@permisos')->name('empleados.permisos');
Route::post('empleados/{empleado}/store-user', 'EmpleadoController@storeUsuario')->name('empleados.store-user');
Route::get('empleados/{empleado}/asignar-usuario', 'EmpleadoController@asignarUsuario')->name('empleados.asignar-usuario');
Route::resource('empleados', 'EmpleadoController');

Route::resource('isapres', 'IsapreController');

Route::resource('materias', 'MateriaController');

Route::resource('cortes', 'CorteController');


Route::get('intervinientes/showJson', 'IntervinienteController@showJson')->name('intervinientes.showJson');
Route::get('intervinientes/search', 'IntervinienteController@search')->name('intervinientes.search');
Route::resource('intervinientes', 'IntervinienteController');

Route::resource('estadoscasos', 'EstadoCasoController');

Route::resource('estadosMaterias', 'EstadoMateriaController');


Route::get('casos/reporte', 'CasoController@reporte')->name('casos.reporte');
Route::get('casos/search', 'CasoController@search')->name('casos.search');
Route::get('uploads/files/{hash}/{name}', 'UploadController@get_file')->name('casos.ver-archivos');
Route::get('casos/{caso}/uploaded_files', 'CasoController@uploaded_files')->name('casos.listar-archivos');
Route::post('casos/upload_files', 'CasoController@upload_files')->name('casos.subir-archivos');
Route::post('casos/editar-en-linea', 'CasoController@editInLine')->name('casos.editar-en-linea');
Route::resource('casos', 'CasoController');

});