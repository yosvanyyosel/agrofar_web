<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        return Tarea::all();
    }

    public function show($id)
    {
        return Tarea::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_trabajador' => 'required|string|size:11',
            'id_labor' => 'required|string|max:20',
            'id_produccion' => 'required|string|max:20',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);
        return Tarea::create($validated);
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);
        $validated = $request->validate([
            'id_trabajador' => 'sometimes|required|string|size:11',
            'id_labor' => 'sometimes|required|string|max:20',
            'id_produccion' => 'sometimes|required|string|max:20',
            'fecha_inicio' => 'sometimes|required|date',
            'fecha_fin' => 'sometimes|required|date|after_or_equal:fecha_inicio'
        ]);
        $tarea->update($validated);
        return $tarea;
    }

    public function destroy($id)
    {
        Tarea::findOrFail($id)->delete();
        return response()->noContent();
    }
}
