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

	//RUTAS Jubilados
	Route::get('superannuated/create', 'SuperannuatedController@create')->name('create.superannuated');
	Route::get('superannuated/index', 'SuperannuatedController@index')->name('index.superannuated');
	Route::get('superannuated/show/{id}', 'SuperannuatedController@show')->name('show.superannuated');
	Route::post('superannuated/store', 'SuperannuatedController@store')->name('store.superannuated');
	Route::get('superannuated/edit/{id}', 'SuperannuatedController@edit')->name('edit.superannuated');

	//RUTAS Gacetas
	Route::get('gazette/index', 'GazetteController@index')->name('index.gazette');
	Route::get('gazette/create', 'GazetteController@create')->name('create.gazette');
	Route::get('gazette/show/{gaceta}', 'GazetteController@show')->name('show.gazette');
	Route::post('gazette/store', 'GazetteController@store')->name('store.gazette');
	Route::get('gazette/edit/{gaceta}', 'GazetteController@edit')->name('edit.gazette');


	Route::post('get/entity', 'EntityController@getEntities')->name('get.entity');

	Route::get('/home', function () {
    	return view('home');
	});

	
});







