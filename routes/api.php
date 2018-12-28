<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'v1'], function () {
        Route::group(['prefix' => 'provincias'], function () {
            Route::get('/comunas/{provincias_id}', 'ProvinciaAPIController@loadComunas')->name('provincias.loadComunas');
            Route::get('/{provincias_id}', 'ProvinciaAPIController@loadProvincias')->name('provincias.loadProvincias');
        });


        Route::resource('observacionesCasos', 'ObservacionCasoAPIController');
        //Route::resource('empresas', 'EmpresaAPIController');
        //Route::resource('sucursales', 'SucursalAPIController');
    });
});

