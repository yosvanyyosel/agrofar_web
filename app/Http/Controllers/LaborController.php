<?php
namespace App\Http\Controllers;

use App\Models\Labor;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    public function index()
    {
        $labors = Labor::all();
        return view('labors.index', compact('labors'));
    }

    public function show($id)
    {
        $labor = Labor::findOrFail($id);
        return view('labors.show', compact('labor'));
    }

    public function create()
    {
        return view('labors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_labor' => 'required|string|max:20',
            'nombre' => 'required|string|max:100'
        ]);
        Labor::create($validated);
        return redirect()->route('labors.index')->with('success', 'Labor creada correctamente');
    }

    public function edit($id)
    {
        $labor = Labor::findOrFail($id);
        return view('labors.edit', compact('labor'));
    }

    public function update(Request $request, $id)
    {
        $labor = Labor::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:100'
        ]);
        $labor->update($validated);
        return redirect()->route('labors.index')->with('success', 'Labor actualizada correctamente');
    }

    public function destroy($id)
    {
        Labor::findOrFail($id)->delete();
        return redirect()->route('labors.index')->with('success', 'Labor eliminada correctamente');
    }
}
