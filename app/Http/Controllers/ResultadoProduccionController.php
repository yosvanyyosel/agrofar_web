<?php
namespace App\Http\Controllers;

use App\Models\ResultadoProduccion;
use Illuminate\Http\Request;

class ResultadoProduccionController extends Controller
{
    public function index()
    {
        $resultados = ResultadoProduccion::all();
        return view('resultados_produccion.index', compact('resultados'));
    }

    public function show($id)
    {
        $resultado = ResultadoProduccion::findOrFail($id);
        return view('resultados_produccion.show', compact('resultado'));
    }

    public function create()
    {
        return view('resultados_produccion.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produccion' => 'required|string|max:20',
            'cantidad_producida' => 'required|numeric|min:0.01',
            'unidad_medida' => 'required|string|max:10',
            'fecha_cosecha' => 'required|date',
            'destino' => 'required|string|max:100'
        ]);
        ResultadoProduccion::create($validated);
        return redirect()->route('resultados-produccion.index')->with('success', 'Resultado registrado correctamente');
    }

    public function edit($id)
    {
        $resultado = ResultadoProduccion::findOrFail($id);
        return view('resultados_produccion.edit', compact('resultado'));
    }

    public function update(Request $request, $id)
    {
        $resultado = ResultadoProduccion::findOrFail($id);
        $validated = $request->validate([
            'cantidad_producida' => 'required|numeric|min:0.01',
            'unidad_medida' => 'required|string|max:10',
            'fecha_cosecha' => 'required|date',
            'destino' => 'required|string|max:100'
        ]);
        $resultado->update($validated);
        return redirect()->route('resultados-produccion.index')->with('success', 'Resultado actualizado correctamente');
    }

    public function destroy($id)
    {
        ResultadoProduccion::findOrFail($id)->delete();
        return redirect()->route('resultados-produccion.index')->with('success', 'Resultado eliminado correctamente');
    }
}
