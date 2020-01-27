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

Route::get('/incidencias', 'IncidenciaController@index')->name('incidencia.index')->middleware('auth');

Route::get('/incidencias/create', 'IncidenciaController@create')->name('incidencia.create')->middleware('auth');

Route::post('/incidencias', 'IncidenciaController@store')->name('incidencia.store')->middleware('auth');

Route::get('/incidencias/estadisticas', function () {
    $consulta = \App\Incidencia::all()->where('estado', '=', 'ACTIVA');
    $total_incidencias = \App\Incidencia::all();
    $resolucion_insitu = \App\Incidencia::all()->where('tipo_resolucion', '=', 'INSITU');
    $resolucion_taller = \App\Incidencia::all()->where('tipo_resolucion', '=', 'TALLER');
    $tecnicos = \App\Tecnico::all();

    $inc_por_tecnico = \App\Incidencia::groupBy('tecnico_id')->orderBy('incidencias', 'desc')->get(DB::raw('count(tecnico_id) as incidencias, tecnico_id'));
    //DB::table('incidencias')->groupBy('tecnico_id')->orderBy('incidencias', 'desc')->get(DB::raw('count(tecnico_id) as incidencias, tecnico_id'))->take(10);

    $gipuzkoa = 'Gipuzkoa'; $araba = 'Araba'; $bizkaia = 'Bizkaia'; $nafarroa = 'Nafarroa';
    $incidencias_bizkaia = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$bizkaia}%")->get();
    $incidencias_gipuzkoa = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$gipuzkoa}%")->get();
    $incidencias_araba = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$araba}%")->get();
    $incidencias_nafarroa = \App\Incidencia::select('direccion')->where('direccion', 'like', "%{$nafarroa}%")->get();


    return view('view_estadisticas', ['consulta' => $consulta,
        'resolucion_insitu' => $resolucion_insitu,'resolucion_taller' => $resolucion_taller,
        'total_incidencias' =>$total_incidencias,'tecnicos'=>$tecnicos,
        'incidencias_gipuzkoa'=>$incidencias_gipuzkoa,'incidencias_araba'=>$incidencias_araba,
        'incidencias_bizkaia'=> $incidencias_bizkaia,'incidencias_nafarroa'=>$incidencias_nafarroa,
        'inc_por_tecnico' => $inc_por_tecnico
        ]);

})->name('incidencia.estadisticas')->middleware('auth');

Route::get('/incidencias/{id}', 'IncidenciaController@show')->name('incidencia.show')->middleware('auth');

Route::get('/incidencias/{id}/edit', 'IncidenciaController@edit')->name('incidencia.edit')->middleware('auth');

Route::post('/incidencias/{id}', 'IncidenciaController@update')->name('incidencia.update')->middleware('auth');
//USUARIOS

Route::get('/usuarios', 'UserController@index')->name('usuario.index')->middleware('auth');

/*Route::get('/usuarios/create',function () {
    return redirect()->route('register');})->name('usuario.create');
*/
//prueba insertar usuario
Route::post('/usuarios', 'UserController@store')->name('usuario.store')->middleware('auth');

Route::get('/usuarios/create', 'UserController@create')->name('usuario.create')->middleware('auth');

Route::get('/usuarios/{id}', 'UserController@show')->name('usuario.show')->middleware('auth');

Route::get('/usuarios/{id}/edit', 'UserController@edit')->name('usuario.edit')->middleware('auth');

Route::post('/usuarios/{id}', 'UserController@update')->name('usuario.update')->middleware('auth');

//COCHES

Route::get('/coches/{matricula}', 'CocheController@show')->name('coche.show');

//CENTROS

Route::get('/centros/{id}', 'CentroController@show')->name('centro.show');

//COMENTARIOS

Route::post('/incidencias/{incidencia_id}/comentarios', 'ComentarioController@store')->name('comentario.store');

//TECNICOS

Route::post('/tecnicos/{id}', 'TecnicoController@update')->name('tecnico.update');

Auth::routes();
