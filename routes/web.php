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
    return view('auth.login');
}); 
Route::get('/login', function () {
    return view('auth.login');
});


#SEGURIDAD DEL MIDDLEWARE PARA LA URL ARCHIVOS QUE LO DOMINAN: /En: MIDDLEWARE SECURITY FOR THE URL DOMAIN FILE: 

#middlewareSesion.php/kernel.php/controladorLogin /En: middlewareSesion.php / kernel.php / controllerLogin


Route::post('/sesion', 'controladorLogin@login');
Route::get('/logout', 'controladorLogin@logout');

session_start();

Route::group(['middleware' => 'sesion'], function () {

	//RUTAS VISTAS
	Route::get('registrar', 'jubilacionesController@create')->name('RegistrarJubilado');
	Route::get('consultar', 'jubilacionesController@index')->name('ConsultarJubilado');
	Route::get('/home', function () {
    	return view('home');
	});

	Route::get('/gaceta', function () {
    	return view('gaceta.index');
	});
	Route::get('jubilado/{id}', 'jubilacionesController@show')->name('Showjubilaciones');

//RUTAS FUNCIONES
Route::post('nuevo-jubilado', 'jubilacionesController@store')->name('Storejubilados');
Route::get('entes', 'jubilacionesController@getEntes');
Route::get('list', 'jubilacionesController@getlist');
Route::get('categorias-entes', 'jubilacionesController@getCategorias');
	
});







