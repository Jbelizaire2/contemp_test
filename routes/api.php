<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\PublicacionesController;
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

Route::put('usuarios/{email?}', [UsuariosController::class, 'update1']);
//Goup API AUTH... with token
Route::group(['middleware'  => 'auth:api',
'headers'     => ['Accept' => 'application/json']
], function(){
    Route::resource('usuarios/{id}/comentarios',ComentariosController::class)->parameters([
        'comentarios' => 'idc'
        ]);
    Route::resource('usuarios/{id}/publicaciones',PublicacionesController::class)->parameters([
        'publicaciones' => 'idp'
        ]);
});
