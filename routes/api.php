<?php

use App\Pagos;
use App\Tarjetas;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listado_pagos', function(){
	$datos = Pagos::all();
	return array('data' => $datos);
});

Route::get('borrar/{id}', function($id){
	$datos = Tarjetas::find($id);
    if($datos->delete()){
        return array('msj' => 'Se ha borrado con exito');
    }
	
});