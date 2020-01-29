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

Route::get('/mapa', function () {
    return view('mapa');
});

Route::get('/', function () {
    return redirect()->route('incidencia.index');
});
Route::get('/home', function () {
    return redirect()->route('incidencia.index');
});

//INCIDENCIAS
Route::get('/api/incidencias', 'IncidenciaController@search')->name('incidencia.search');

Route::get('/api/incidencias/{busqueda}/{opcion}', 'IncidenciaController@busqueda')->name('incidencia.busqueda');

Route::get('/incidencias', 'IncidenciaController@index')->name('incidencia.index')->middleware('auth');

Route::get('/incidencias/create', 'IncidenciaController@create')->name('incidencia.create')->middleware('auth');

Route::post('/incidencias', 'IncidenciaController@store')->name('incidencia.store')->middleware('auth');

Route::get('/incidencias/estadisticas','EstadisticasController@selectEstadisticas')->name('incidencia.estadisticas')->middleware('auth');

Route::get('/incidencias/tecnicos','EstadisticasController@estadisticasTecnicos')->name('estadistica.tecnicos')->middleware('auth');

Route::get('/incidencias/{id}', 'IncidenciaController@show')->name('incidencia.show')->middleware('auth');

Route::get('/incidencias/{id}/edit', 'IncidenciaController@edit')->name('incidencia.edit')->middleware('auth');

Route::post('/incidencias/{id}/tecnico', 'IncidenciaController@tecnico')->name('incidencia.tecnico')->middleware('auth');

Route::post('/incidencias/{id}', 'IncidenciaController@update')->name('incidencia.update')->middleware('auth');

//USUARIOS

Route::get('/usuarios', 'UserController@index')->name('usuario.index')->middleware('auth');

Route::post('/usuarios', 'UserController@store')->name('usuario.store')->middleware('auth');

Route::get('/usuarios/create', 'UserController@create')->name('usuario.create')->middleware('auth');

Route::get('/usuarios/{id}', 'UserController@show')->name('usuario.show')->middleware('auth');

Route::get('/usuarios/{id}/edit', 'UserController@edit')->name('usuario.edit')->middleware('auth');

Route::post('/usuarios/{id}', 'UserController@update')->name('usuario.update')->middleware('auth');

//COCHES

Route::get('/coches/{matricula}', 'CocheController@show')->name('coche.show');

//CENTROS

Route::get('/centros/{id}', 'CentroController@show')->name('centro.show')->middleware('auth');

Route::get('/api/centros/{id}', 'CentroController@get')->name('centro.json');

//COMENTARIOS

Route::post('/incidencias/{incidencia_id}/comentarios', 'ComentarioController@store')->name('comentario.store');

//TECNICOS

Route::get('/tecnicos/{id}', 'TecnicoController@show')->name('tecnico.show')->middleware('auth');

Route::post('/tecnicos/{id}', 'TecnicoController@update')->name('tecnico.update');

Auth::routes();
