<?php

namespace App\Http\Controllers;

use App\Models\Quimico;
use Illuminate\Http\Request;

class QuimicoController extends Controller
{
    public function index()
    {
        return Quimico::all();
    }

    public function show($nombre)
    {
        return Quimico::findOrFail($nombre);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string|max:30',
            'unidad_medida' => 'required|string|max:20',
            'cantidad_disponible' => 'required|numeric|min:0.01',
            'precio_unitario' => 'required|numeric|min:0.01',
            'dosis_maxima_ha' => 'required|numeric|min:0.01'
        ]);
        return Quimico::create($validated);
    }

    public function update(Request $request, $nombre)
    {
        $quimico = Quimico::findOrFail($nombre);
        $validated = $request->validate([
            'tipo' => 'sometimes|required|string|max:30',
            'unidad_medida' => 'sometimes|required|string|max:20',
            'cantidad_disponible' => 'sometimes|required|numeric|min:0.01',
            'precio_unitario' => 'sometimes|required|numeric|min:0.01',
            'dosis_maxima_ha' => 'sometimes|required|numeric|min:0.01'
        ]);
        $quimico->update($validated);
        return $quimico;
    }

    public function destroy($nombre)
    {
        Quimico::findOrFail($nombre)->delete();
        return response()->noContent();
    }
}
