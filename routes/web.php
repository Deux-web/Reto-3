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

Route::get('/',function (){
    return redirect()->route('incidencias.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/incidencias', 'CocheController@index')->name('incidencias.index')->middleware('auth');
