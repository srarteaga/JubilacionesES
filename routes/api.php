<?php

use Illuminate\Http\Request;
use App\Superannuated;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::middleware('sesion')->get('superannuated', function(){
	return datatables()
	->eloquent(
		App\Superannuated::query()
		->selectRaw('CONCAT(name, " ", lastname) as fullname, id, identification, roster_id, reason_id, entity_id, number_correspondecia, date_correspondencia, number_vp, date_correspondencia_ent, status_id, number_vp')
	)->toJson();
});*/
Route::middleware('sesion')->get('superannuated', 'SuperannuatedController@getSuperannuated')->name('get.superannuated');
Route::middleware('sesion')->get('gazette', 'GazetteController@getGazette')->name('get.gazette');
