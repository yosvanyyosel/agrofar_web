<?php
namespace App\Http\Controllers;

use App\Models\Quimico;
use Illuminate\Http\Request;

class QuimicoController extends Controller
{
    public function index()
    {
        $quimicos = Quimico::all();
        return view('quimicos.index', compact('quimicos'));
    }

    public function show($nombre)
    {
        $quimico = Quimico::findOrFail($nombre);
        return view('quimicos.show', compact('quimico'));
    }

    public function create()
    {
        return view('quimicos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string|max:30',
            'unidad_medida' => 'required|string|max:20',
            'cantidad_disponible' => 'required|numeric|min:0.01',
            'precio_unitario' => 'required|numeric|min:0.01',
            'dosis_maxima_ha' => 'required|numeric|min:0.01'
        ]);
        Quimico::create($validated);
        return redirect()->route('quimicos.index')->with('success', 'Químico creado correctamente');
    }

    public function edit($nombre)
    {
        $quimico = Quimico::findOrFail($nombre);
        return view('quimicos.edit', compact('quimico'));
    }

    public function update(Request $request, $nombre)
    {
        $quimico = Quimico::findOrFail($nombre);
        $validated = $request->validate([
            'tipo' => 'required|string|max:30',
            'unidad_medida' => 'required|string|max:20',
            'cantidad_disponible' => 'required|numeric|min:0.01',
            'precio_unitario' => 'required|numeric|min:0.01',
            'dosis_maxima_ha' => 'required|numeric|min:0.01'
        ]);
        $quimico->update($validated);
        return redirect()->route('quimicos.index')->with('success', 'Químico actualizado correctamente');
    }

    public function destroy($nombre)
    {
        Quimico::findOrFail($nombre)->delete();
        return redirect()->route('quimicos.index')->with('success', 'Químico eliminado correctamente');
    }
}
