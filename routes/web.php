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
Route::get('/factores-internos', 'HomeController@interno')->name('factores-internos');
Route::get('/factores-externos', 'HomeController@externo')->name('factores-externos');


    
Route::get('/mision-vision', 'HomeController@misionVision')->name('mision.vision');
Route::get('/valores', 'HomeController@valores')->name('valores');
    
Route::middleware('auth')->group(function(){
    Route::get('/create-actividad/{area_id}','ActivityController@new')->name('create-actividad');
    Route::put('/actividad/actualizar', 'ActivityController@update');

            
    Route::get('/actividad-interno/{id}','ActivityController@internoEdit');
    Route::put('/actividad-interno/{activity}','ActivityController@interno')->name('actividad-interno');
    Route::put('/actividad-externo/{claves}','ClavesController@externo')->name('actividad-externo');
    Route::get('/actividad-externo/{id}','ClavesController@externoEdit');
        
    Route::get('/claves/create/{id}', 'ClavesController@create')->name('claves.create');
        
    Route::resource('activities', 'ActivityController')->except(['index', 'show','update']);       
    Route::resource('areas','AreaController')->except(['index','show']);
    Route::resource('missions','MissionController')->except(['index','show']);
    Route::resource('visions','VisionController')->except(['index','show']);
    Route::resource('valores','ValoresController')->except(['index','show']);    
    Route::resource('fuerzas','FuerzasController')->except(['show']);    
    Route::resource('claves','ClavesController')->except(['index','show','create']);    
});