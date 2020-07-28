<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([
	'middleware'=>['cors','api'],
	'prefix'=>'auth'
], function($router){
	Route::post('login','AuthController@login');
	Route::post('logout','AuthController@logout');
	Route::post('refresh','AuthController@refersh');
	Route::post('me','AuthController@me');
	Route::post('usertipo','TblClienteController@user_client');
	Route::post('traerclient','TblClienteController@traer_client');
	Route::post('show_cliente','TblClienteController@show_cliente');
	Route::post('traerdoct','TblDoctorController@traer_doctor');
	Route::post('reserv','TblReservaController@show_edit');
	Route::post('reservacliente','TblReservaController@index_cliente');
	Route::post('existencia','TblReservaController@existencia');
	Route::post('historial_fecha','TblHistorialController@index_fecha');
	Route::post('historial_nombre','TblHistorialController@index_nombres');
	Route::get('reserva_cambio','TblReservaController@index_cambio');
	Route::resource('cliente','TblClienteController');
	Route::resource('doctor','TblDoctorController');
	Route::resource('servicio','TblServicioController');
	Route::resource('historial','TblHistorialController');
	Route::resource('reserva','TblReservaController');
});

