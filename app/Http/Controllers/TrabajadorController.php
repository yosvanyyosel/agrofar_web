<?php
namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajadores = Trabajador::all();
        return view('trabajadores.index', compact('trabajadores'));
    }

    public function show($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        return view('trabajadores.show', compact('trabajador'));
    }

    public function create()
    {
        return view('trabajadores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_trabajador' => 'required|string|size:11',
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'escolaridad' => 'required|string|max:100',
            'cargo' => 'nullable|string|max:100',
            'salario_mensual' => 'required|numeric|min:1'
        ]);
        Trabajador::create($validated);
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador creado correctamente');
    }

    public function edit($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        return view('trabajadores.edit', compact('trabajador'));
    }

    public function update(Request $request, $id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'escolaridad' => 'required|string|max:100',
            'cargo' => 'nullable|string|max:100',
            'salario_mensual' => 'required|numeric|min:1'
        ]);
        $trabajador->update($validated);
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador actualizado correctamente');
    }

    public function destroy($id)
    {
        Trabajador::findOrFail($id)->delete();
        return redirect()->route('trabajadores.index')->with('success', 'Trabajador eliminado correctamente');
    }
}
