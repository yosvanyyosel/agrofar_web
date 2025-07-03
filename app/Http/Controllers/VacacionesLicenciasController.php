<?php

namespace App\Http\Controllers;

use App\Models\VacacionLicencia;
use Illuminate\Http\Request;

class VacacionesLicenciasController extends Controller
{
    public function index()
    {
        $vacaciones = VacacionLicencia::all();
        return view('vacaciones_licencias.index', compact('vacaciones'));
    }

    public function show($id_trabajador, $fecha_inicio)
    {
        $vacacion = VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->firstOrFail();
        return view('vacaciones_licencias.show', compact('vacacion'));
    }

    public function create()
    {
        return view('vacaciones_licencias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_trabajador' => 'required|string|size:11',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'tipo_ausencia' => 'required|string|max:20',
            'motivo' => 'nullable|string|max:50'
        ]);
        VacacionLicencia::create($validated);
        return redirect()->route('vacaciones-licencias.index')->with('success', 'Vacación/Licencia registrada correctamente');
    }

    public function edit($id_trabajador, $fecha_inicio)
    {
        $vacacion = VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->firstOrFail();
        return view('vacaciones_licencias.edit', compact('vacacion'));
    }

    public function update(Request $request, $id_trabajador, $fecha_inicio)
    {
        $vacacion = VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->firstOrFail();
        $validated = $request->validate([
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'tipo_ausencia' => 'required|string|max:20',
            'motivo' => 'nullable|string|max:50'
        ]);
        $vacacion->update($validated);
        return redirect()->route('vacaciones-licencias.index')->with('success', 'Vacación/Licencia actualizada correctamente');
    }

    public function destroy($id_trabajador, $fecha_inicio)
    {
        VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->delete();
        return redirect()->route('vacaciones-licencias.index')->with('success', 'Vacación/Licencia eliminada correctamente');
    }
}
