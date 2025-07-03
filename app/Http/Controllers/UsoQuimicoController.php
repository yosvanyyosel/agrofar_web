<?php

namespace App\Http\Controllers;

use App\Models\UsoQuimico;
use Illuminate\Http\Request;

class UsoQuimicoController extends Controller
{
    public function index()
    {
        $usos = UsoQuimico::all();
        return view('uso_quimicos.index', compact('usos'));
    }

    public function show($id_tarea, $nombre_quimico)
    {
        $uso = UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->firstOrFail();
        return view('uso_quimicos.show', compact('uso'));
    }

    public function create()
    {
        return view('uso_quimicos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_tarea' => 'required|integer',
            'nombre_quimico' => 'required|string|max:100',
            'dosis_ha' => 'required|numeric|min:0.01',
            'area_aplicada_ha' => 'required|numeric|min:0.01'
        ]);
        UsoQuimico::create($validated);
        return redirect()->route('uso-quimicos.index')->with('success', 'Uso de químico registrado correctamente');
    }

    public function edit($id_tarea, $nombre_quimico)
    {
        $uso = UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->firstOrFail();
        return view('uso_quimicos.edit', compact('uso'));
    }

    public function update(Request $request, $id_tarea, $nombre_quimico)
    {
        $uso = UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->firstOrFail();
        $validated = $request->validate([
            'dosis_ha' => 'required|numeric|min:0.01',
            'area_aplicada_ha' => 'required|numeric|min:0.01'
        ]);
        $uso->update($validated);
        return redirect()->route('uso-quimicos.index')->with('success', 'Uso de químico actualizado correctamente');
    }

    public function destroy($id_tarea, $nombre_quimico)
    {
        UsoQuimico::where('id_tarea', $id_tarea)
            ->where('nombre_quimico', $nombre_quimico)
            ->delete();
        return redirect()->route('uso-quimicos.index')->with('success', 'Uso de químico eliminado correctamente');
    }
}
