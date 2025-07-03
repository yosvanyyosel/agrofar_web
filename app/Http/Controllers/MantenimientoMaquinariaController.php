<?php

namespace App\Http\Controllers;

use App\Models\MantenimientoMaquinaria;
use Illuminate\Http\Request;

class MantenimientoMaquinariaController extends Controller
{
    public function index()
    {
        return MantenimientoMaquinaria::all();
    }

    public function show($id_maquinaria, $inicio)
    {
        return MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->firstOrFail();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_maquinaria' => 'required|string|max:20',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
            'costo' => 'required|integer|min:1'
        ]);
        return MantenimientoMaquinaria::create($validated);
    }

    public function update(Request $request, $id_maquinaria, $inicio)
    {
        $mantenimiento = MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->firstOrFail();
        $validated = $request->validate([
            'fin' => 'sometimes|required|date|after:inicio',
            'costo' => 'sometimes|required|integer|min:1'
        ]);
        $mantenimiento->update($validated);
        return $mantenimiento;
    }

    public function destroy($id_maquinaria, $inicio)
    {
        MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->delete();
        return response()->noContent();
    }
}
