<?php
namespace App\Http\Controllers;

use App\Models\HabilidadTrabajador;
use Illuminate\Http\Request;

class HabilidadesTrabajadorController extends Controller
{
    public function index()
    {
        $habilidades = HabilidadTrabajador::all();
        return view('habilidades_trabajadores.index', compact('habilidades'));
    }

    public function show($id_trabajador, $tipo_labor)
    {
        $habilidad = HabilidadTrabajador::where('id_trabajador', $id_trabajador)
            ->where('tipo_labor', $tipo_labor)
            ->firstOrFail();
        return view('habilidades_trabajadores.show', compact('habilidad'));
    }

    public function create()
    {
        return view('habilidades_trabajadores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_trabajador' => 'required|string|size:11',
            'tipo_labor' => 'required|string|max:20'
        ]);
        HabilidadTrabajador::create($validated);
        return redirect()->route('habilidades-trabajadores.index')->with('success', 'Habilidad asignada correctamente');
    }

    public function edit($id_trabajador, $tipo_labor)
    {
        $habilidad = HabilidadTrabajador::where('id_trabajador', $id_trabajador)
            ->where('tipo_labor', $tipo_labor)
            ->firstOrFail();
        return view('habilidades_trabajadores.edit', compact('habilidad'));
    }

    public function update(Request $request, $id_trabajador, $tipo_labor)
    {
        $habilidad = HabilidadTrabajador::where('id_trabajador', $id_trabajador)
            ->where('tipo_labor', $tipo_labor)
            ->firstOrFail();
        $validated = $request->validate([
            'id_trabajador' => 'required|string|size:11',
            'tipo_labor' => 'required|string|max:20'
        ]);
        $habilidad->update($validated);
        return redirect()->route('habilidades-trabajadores.index')->with('success', 'Habilidad actualizada correctamente');
    }

    public function destroy($id_trabajador, $tipo_labor)
    {
        HabilidadTrabajador::where('id_trabajador', $id_trabajador)
            ->where('tipo_labor', $tipo_labor)
            ->delete();
        return redirect()->route('habilidades-trabajadores.index')->with('success', 'Habilidad eliminada correctamente');
    }
}
