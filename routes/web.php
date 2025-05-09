<?php

use Illuminate\Support\Facades\Route;

// Arquivo web.php vazio ou com uma rota básica para não causar erro
Route::get('/', function () {
    return response()->json(['message' => 'API está ativa!']);
});
