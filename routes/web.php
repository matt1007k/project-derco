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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create-actividad/{area_id}','ActivityController@new')->name('create-actividad');
Route::put('/actividad/actualizar', 'ActivityController@update')->middleware('auth');

Route::resource('activities', 'ActivityController')
    ->except([
        'index', 'show','update'
    ])->middleware('auth');
Route::resource('areas','AreaController')
    ->except([
        'index','show'
    ])->middleware('auth');
Route::middleware('auth')->group(function(){
    Route::get('/factores-internos', 'HomeController@interno')->name('factores-internos');
    Route::get('/factores-externos', 'HomeController@externo')->name('factores-externos');
    Route::put('/actividad-interno/{activity}','ActivityController@interno')->name('actividad-interno');
    Route::get('/actividad-interno/{id}','ActivityController@internoEdit');
    Route::resource('missions','MissionController');
});