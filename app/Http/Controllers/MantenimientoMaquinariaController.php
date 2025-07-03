<?php
namespace App\Http\Controllers;

use App\Models\MantenimientoMaquinaria;
use Illuminate\Http\Request;

class MantenimientoMaquinariaController extends Controller
{
    public function index()
    {
        $mantenimientos = MantenimientoMaquinaria::all();
        return view('mantenimiento_maquinarias.index', compact('mantenimientos'));
    }

    public function show($id_maquinaria, $inicio)
    {
        $mantenimiento = MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->firstOrFail();
        return view('mantenimiento_maquinarias.show', compact('mantenimiento'));
    }

    public function create()
    {
        return view('mantenimiento_maquinarias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_maquinaria' => 'required|string|max:20',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
            'costo' => 'required|integer|min:1'
        ]);
        MantenimientoMaquinaria::create($validated);
        return redirect()->route('mantenimiento-maquinarias.index')->with('success', 'Mantenimiento registrado correctamente');
    }

    public function edit($id_maquinaria, $inicio)
    {
        $mantenimiento = MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->firstOrFail();
        return view('mantenimiento_maquinarias.edit', compact('mantenimiento'));
    }

    public function update(Request $request, $id_maquinaria, $inicio)
    {
        $mantenimiento = MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->firstOrFail();
        $validated = $request->validate([
            'fin' => 'required|date|after:inicio',
            'costo' => 'required|integer|min:1'
        ]);
        $mantenimiento->update($validated);
        return redirect()->route('mantenimiento-maquinarias.index')->with('success', 'Mantenimiento actualizado correctamente');
    }

    public function destroy($id_maquinaria, $inicio)
    {
        MantenimientoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('inicio', $inicio)
            ->delete();
        return redirect()->route('mantenimiento-maquinarias.index')->with('success', 'Mantenimiento eliminado correctamente');
    }
}
