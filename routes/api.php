<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\ComentariosController;
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
Route::resource('usuarios',UsuariosController::class)->parameters([
'usuarios' => 'id'
]);
Route::resource('comentarios',ComentariosController::class)->parameters([
    'comentarios' => 'id'
    ]);
Route::resource('publicaciones',PublicacionesController::class)->parameters([
    'publicaciones' => 'id'
    ]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
