<?php

namespace App\Http\Controllers;

use App\Models\UsoQuimico;
use Illuminate\Http\Request;

class UsoQuimicoController extends Controller
{
    public function index()
    {
        return UsoQuimico::all();
    }

    public function show($id_tarea, $nombre_quimico)
    {
        return UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->firstOrFail();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_tarea' => 'required|integer',
            'nombre_quimico' => 'required|string|max:100',
            'dosis_ha' => 'required|numeric|min:0.01',
            'area_aplicada_ha' => 'required|numeric|min:0.01'
        ]);
        return UsoQuimico::create($validated);
    }

    public function update(Request $request, $id_tarea, $nombre_quimico)
    {
        $uso = UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->firstOrFail();
        $validated = $request->validate([
            'dosis_ha' => 'sometimes|required|numeric|min:0.01',
            'area_aplicada_ha' => 'sometimes|required|numeric|min:0.01'
        ]);
        $uso->update($validated);
        return $uso;
    }

    public function destroy($id_tarea, $nombre_quimico)
    {
        UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->delete();
        return response()->noContent();
    }
}
