<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Estas rotas são carregadas pelo RouteServiceProvider dentro de um grupo
| que é atribuído ao grupo de middleware "api".
| Aqui é onde você define suas rotas de API.
*/

// Exemplo de rota de teste
Route::get('/teste', function () {
    return response()->json(['message' => 'API está ativa!']);
});

// Rotas RESTful para categorias e serviços
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('servicos', ServiceController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
