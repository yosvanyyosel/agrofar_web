<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    public function index()
    {
        $producciones = Produccion::all();
        return view('producciones.index', compact('producciones'));
    }

    public function show($id)
    {
        $produccion = Produccion::findOrFail($id);
        return view('producciones.show', compact('produccion'));
    }

    public function create()
    {
        return view('producciones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produccion' => 'required|string|max:20',
            'area_id' => 'required|string',
            'cultivo' => 'required|string|max:20',
            'variedad' => 'required|string|max:100',
            'estado' => 'nullable|string|max:20'
        ]);
        Produccion::create($validated);
        return redirect()->route('producciones.index')->with('success', 'Producción creada correctamente');
    }

    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        return view('producciones.edit', compact('produccion'));
    }

    public function update(Request $request, $id)
    {
        $produccion = Produccion::findOrFail($id);
        $validated = $request->validate([
            'area_id' => 'required|string',
            'cultivo' => 'required|string|max:20',
            'variedad' => 'required|string|max:100',
            'estado' => 'nullable|string|max:20'
        ]);
        $produccion->update($validated);
        return redirect()->route('producciones.index')->with('success', 'Producción actualizada correctamente');
    }

    public function destroy($id)
    {
        Produccion::findOrFail($id)->delete();
        return redirect()->route('producciones.index')->with('success', 'Producción eliminada correctamente');
    }
}
