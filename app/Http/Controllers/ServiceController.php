<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use App\Http\Requests\StoreServicoRequest;

class ServiceController extends Controller
{
    // Lista todos os serviços
    public function index()
    {
        return response()->json(Servico::all());
    }

    // Cria um novo serviço
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'description' => 'nullable|string',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $servico = Servico::create($validated);
        return response()->json($servico, 201);
    }

    // Retorna um serviço específico
    public function show($id)
    {
        $servico = Servico::findOrFail($id);
        return response()->json($servico);
    }

    // Atualiza um serviço existente
    public function update(Request $request, $id)
    {
        $servico = Servico::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'preco' => 'sometimes|required|numeric',
            'categoria_id' => 'sometimes|required|exists:categorias,id'
        ]);

        $servico->update($validated);
        return response()->json($servico);
    }

    // Deleta um serviço
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return response()->json(['message' => 'Serviço deletado com sucesso.']);
    }
}
