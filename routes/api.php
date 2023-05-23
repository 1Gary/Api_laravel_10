<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\categoriacontroller;
use app\Http\Controllers\pedido_detalle;

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

//
Route::get('categoria','categoriacontroller@getCategoria');

//buscar x id
Route::get('categoriaID/{id}','categoriacontroller@getCategoriaxid');

//agregar registros
Route::post('addCategoria','categoriacontroller@agregarCategoria');

//Actualizar registros
Route::put('updateCategoria/{id}','categoriacontroller@updatecategoria');

//delete
Route::delete('delcategoria/{id}','categoriacontroller@deletecategoria');


//agregar y actualizar registros
Route::post('addCategoriaxupdatecat','categoriacontroller@updatexcreate');

//agregar y pedido/detalle
Route::post('addpedidoxdetalle','pedido_detalle@insert_pedido_detalle');

//get_Pedido_Detalle_x_id
Route::get('getpedidoDetallexid/{id}','pedido_detalle@getPedido_detalle_x_id');

//get_Pedido_Detalle
Route::get('getpedidoDetalle','pedido_detalle@get_pedido_detalle');

//Actualizar registro pedido_detalle
Route::put('updateaddpedidoxdetalle/{id}','pedido_detalle@updateaddpedidoxdetalle');


