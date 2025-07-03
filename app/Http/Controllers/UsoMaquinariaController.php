<?php

namespace App\Http\Controllers;

use App\Models\UsoMaquinaria;
use Illuminate\Http\Request;

class UsoMaquinariaController extends Controller
{
    public function index()
    {
        return UsoMaquinaria::all();
    }

    public function show($id_maquinaria, $id_tarea)
    {
        return UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->firstOrFail();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_maquinaria' => 'required|string|max:20',
            'id_tarea' => 'required|integer',
            'combustible_consumido' => 'required|numeric|min:0'
        ]);
        return UsoMaquinaria::create($validated);
    }

    public function update(Request $request, $id_maquinaria, $id_tarea)
    {
        $uso = UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->firstOrFail();
        $validated = $request->validate([
            'combustible_consumido' => 'sometimes|required|numeric|min:0'
        ]);
        $uso->update($validated);
        return $uso;
    }

    public function destroy($id_maquinaria, $id_tarea)
    {
        UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->delete();
        return response()->noContent();
    }
}
