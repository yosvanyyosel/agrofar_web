<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index()
    {
        return Maquinaria::all();
    }

    public function show($id)
    {
        return Maquinaria::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_maquinaria' => 'required|string|max:20',
            'tipo' => 'required|string|max:100',
            'consumo_promedio' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50'
        ]);
        return Maquinaria::create($validated);
    }

    public function update(Request $request, $id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        $validated = $request->validate([
            'tipo' => 'sometimes|required|string|max:100',
            'consumo_promedio' => 'sometimes|required|numeric|min:0',
            'estado' => 'sometimes|required|string|max:50'
        ]);
        $maquinaria->update($validated);
        return $maquinaria;
    }

    public function destroy($id)
    {
        Maquinaria::findOrFail($id)->delete();
        return response()->noContent();
    }
}
