<?php
namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }

    public function show($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.show', compact('tarea'));
    }

    public function create()
    {
        return view('tareas.create');
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
        Tarea::create($validated);
        return redirect()->route('tareas.index')->with('success', 'Tarea creada correctamente');
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);
        $validated = $request->validate([
            'id_trabajador' => 'required|string|size:11',
            'id_labor' => 'required|string|max:20',
            'id_produccion' => 'required|string|max:20',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);
        $tarea->update($validated);
        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente');
    }

    public function destroy($id)
    {
        Tarea::findOrFail($id)->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente');
    }
}
