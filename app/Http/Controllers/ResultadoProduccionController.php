<?php

namespace App\Http\Controllers;

use App\Models\ResultadoProduccion;
use Illuminate\Http\Request;

class ResultadoProduccionController extends Controller
{
    public function index()
    {
        return ResultadoProduccion::all();
    }

    public function show($id)
    {
        return ResultadoProduccion::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produccion' => 'required|string|max:20',
            'cantidad_producida' => 'required|numeric|min:0.01',
            'unidad_medida' => 'required|string|max:10',
            'fecha_cosecha' => 'required|date',
            'destino' => 'required|string|max:100'
        ]);
        return ResultadoProduccion::create($validated);
    }

    public function update(Request $request, $id)
    {
        $resultado = ResultadoProduccion::findOrFail($id);
        $validated = $request->validate([
            'cantidad_producida' => 'sometimes|required|numeric|min:0.01',
            'unidad_medida' => 'sometimes|required|string|max:10',
            'fecha_cosecha' => 'sometimes|required|date',
            'destino' => 'sometimes|required|string|max:100'
        ]);
        $resultado->update($validated);
        return $resultado;
    }

    public function destroy($id)
    {
        ResultadoProduccion::findOrFail($id)->delete();
        return response()->noContent();
    }
}
