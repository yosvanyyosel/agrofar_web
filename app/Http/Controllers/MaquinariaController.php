<?php
namespace App\Http\Controllers;

use App\Models\Maquinaria;
use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index()
    {
        $maquinarias = Maquinaria::all();
        return view('maquinarias.index', compact('maquinarias'));
    }

    public function show($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        return view('maquinarias.show', compact('maquinaria'));
    }

    public function create()
    {
        return view('maquinarias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_maquinaria' => 'required|string|max:20',
            'tipo' => 'required|string|max:100',
            'consumo_promedio' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50'
        ]);
        Maquinaria::create($validated);
        return redirect()->route('maquinarias.index')->with('success', 'Maquinaria creada correctamente');
    }

    public function edit($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        return view('maquinarias.edit', compact('maquinaria'));
    }

    public function update(Request $request, $id)
    {
        $maquinaria = Maquinaria::findOrFail($id);
        $validated = $request->validate([
            'tipo' => 'required|string|max:100',
            'consumo_promedio' => 'required|numeric|min:0',
            'estado' => 'required|string|max:50'
        ]);
        $maquinaria->update($validated);
        return redirect()->route('maquinarias.index')->with('success', 'Maquinaria actualizada correctamente');
    }

    public function destroy($id)
    {
        Maquinaria::findOrFail($id)->delete();
        return redirect()->route('maquinarias.index')->with('success', 'Maquinaria eliminada correctamente');
    }
}
