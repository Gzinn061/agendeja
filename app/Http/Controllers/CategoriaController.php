<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function create()
    {
        // Código para exibir formulário de criação
    }

    public function store(StoreCategoriaRequest $request)
    {
        return Categoria::create($request->validated());
    }

    public function show($id)
    {
        // (opcional) Exibir detalhes de uma categoria
    }

    public function edit($id)
    {
        // Código para exibir formulário de edição
    }

    public function update(Request $request, $id)
    {
        // Código para atualizar uma categoria existente
    }

    public function destroy($id)
    {
        // Código para deletar uma categoria
    }
}
