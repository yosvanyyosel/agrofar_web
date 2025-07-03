<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function show($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.show', compact('area'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_area' => 'required|string',
            'nombre' => 'required|string|max:100',
            'superficie_ha' => 'required|numeric|min:0.01'
        ]);
        Area::create($validated);
        return redirect()->route('areas.index')->with('success', 'Área creada correctamente');
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'superficie_ha' => 'required|numeric|min:0.01'
        ]);
        $area->update($validated);
        return redirect()->route('areas.index')->with('success', 'Área actualizada correctamente');
    }

    public function destroy($id)
    {
        Area::findOrFail($id)->delete();
        return redirect()->route('areas.index')->with('success', 'Área eliminada correctamente');
    }
}
