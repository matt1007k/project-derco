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

// Vesion 1.2
Route::get('/organigrama', 'HomeController@organigrama')->name('organigrama');
Route::get('/macroproceso', 'HomeController@macroproceso')->name('macroproceso');
Route::get('/matriz-foda', 'HomeController@matrizFoda')->name('matriz-foda');
Route::get('/fce-cd', 'HomeController@fceCd')->name('fce-cd');
Route::get('/mapa-estrategico', 'HomeController@mapaEstrategico')->name('mapa-estrategico');
Route::get('/foda', 'HomeController@foda')->name('foda');
Route::get('/objetivos', 'HomeController@objetivos')->name('objetivos');

Route::get('/objetivos/{objetivo}/edit/{estrategia_id}', 'ObjetivosController@edit')->name('objetivos.edit');

Route::get('/fortalezas', 'ActivityController@fortalezas')->name('fortalezas');
Route::get('/debilidades', 'ActivityController@debilidades')->name('debilidades');
Route::get('/oportunidades', 'ClavesController@oportunidades')->name('oportunidades');
Route::get('/amenazas', 'ClavesController@amenazas')->name('amenazas');

Route::get('/estrategia-all/{tipo}', 'EstrategiasController@estrategiaAll')->name('estrategia-all');
Route::get('/asignar-estrategias/{objetivo}', 'ObjetivosController@asignarEstrategias')->name('asignar.estrategias');


// Vesion 1.2  


Route::middleware('auth')->group(function(){
    Route::get('/create-actividad/{area_id}','ActivityController@new')->name('create-actividad');
    Route::put('/actividad/actualizar', 'ActivityController@update');

            
    Route::get('/actividad-interno/{id}','ActivityController@internoEdit');
    Route::put('/actividad-interno/{activity}','ActivityController@interno')->name('actividad-interno');
    Route::put('/actividad-externo/{claves}','ClavesController@externo')->name('actividad-externo');
    Route::get('/actividad-externo/{id}','ClavesController@externoEdit');
        
    Route::get('/claves/create/{id}', 'ClavesController@create')->name('claves.create');
        
    Route::resource('activities', 'ActivityController')->except([ 'show','update']);       
    Route::resource('areas','AreaController')->except(['index','show']);
    Route::resource('missions','MissionController')->except(['index','show']);
    Route::resource('visions','VisionController')->except(['index','show']);
    Route::resource('valores','ValoresController')->except(['index','show']);    
    Route::resource('fuerzas','FuerzasController')->except(['show']);    
    Route::resource('claves','ClavesController')->except(['index','show','create']); 
    
    // Vesion 1.2

    Route::resource('estrategias','EstrategiasController')->except(['index','show','create','edit']);
    Route::resource('objetivos','ObjetivosController')->except(['index','show','edit']);
    Route::resource('mapas','MapasController')->except(['index','show','edit']);

    Route::put('/asignar/{objetivo}', 'ObjetivosController@asignar')->name('objetivos.asignar');
    // Vesion 1.2
});