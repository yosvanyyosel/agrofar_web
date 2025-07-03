<?php

namespace App\Http\Controllers;

use App\Models\VacacionLicencia;
use Illuminate\Http\Request;

class VacacionesLicenciasController extends Controller
{
    public function index()
    {
        return VacacionLicencia::all();
    }

    public function show($id_trabajador, $fecha_inicio)
    {
        return VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->firstOrFail();
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
        return VacacionLicencia::create($validated);
    }

    public function update(Request $request, $id_trabajador, $fecha_inicio)
    {
        $vacacion = VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->firstOrFail();
        $validated = $request->validate([
            'fecha_fin' => 'sometimes|required|date|after:fecha_inicio',
            'tipo_ausencia' => 'sometimes|required|string|max:20',
            'motivo' => 'nullable|string|max:50'
        ]);
        $vacacion->update($validated);
        return $vacacion;
    }

    public function destroy($id_trabajador, $fecha_inicio)
    {
        VacacionLicencia::where('id_trabajador', $id_trabajador)
            ->where('fecha_inicio', $fecha_inicio)
            ->delete();
        return response()->noContent();
    }
}
