<?php
namespace App\Http\Controllers;

use App\Models\UsoMaquinaria;
use Illuminate\Http\Request;

class UsoMaquinariaController extends Controller
{
    public function index()
    {
        $usos = UsoMaquinaria::all();
        return view('uso_maquinarias.index', compact('usos'));
    }

    public function show($id_maquinaria, $id_tarea)
    {
        $uso = UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->firstOrFail();
        return view('uso_maquinarias.show', compact('uso'));
    }

    public function create()
    {
        return view('uso_maquinarias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_maquinaria' => 'required|string|max:20',
            'id_tarea' => 'required|integer',
            'combustible_consumido' => 'required|numeric|min:0'
        ]);
        UsoMaquinaria::create($validated);
        return redirect()->route('uso-maquinarias.index')->with('success', 'Uso de maquinaria registrado correctamente');
    }

    public function edit($id_maquinaria, $id_tarea)
    {
        $uso = UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->firstOrFail();
        return view('uso_maquinarias.edit', compact('uso'));
    }

    public function update(Request $request, $id_maquinaria, $id_tarea)
    {
        $uso = UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->firstOrFail();
        $validated = $request->validate([
            'combustible_consumido' => 'required|numeric|min:0'
        ]);
        $uso->update($validated);
        return redirect()->route('uso-maquinarias.index')->with('success', 'Uso de maquinaria actualizado correctamente');
    }

    public function destroy($id_maquinaria, $id_tarea)
    {
        UsoMaquinaria::where('id_maquinaria', $id_maquinaria)
            ->where('id_tarea', $id_tarea)
            ->delete();
        return redirect()->route('uso-maquinarias.index')->with('success', 'Uso de maquinaria eliminado correctamente');
    }
}
