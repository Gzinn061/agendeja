<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServiceController;
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
