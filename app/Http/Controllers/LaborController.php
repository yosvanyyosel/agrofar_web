<?php

namespace App\Http\Controllers;

use App\Models\Labor;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    public function index()
    {
        return Labor::all();
    }

    public function show($id)
    {
        return Labor::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_labor' => 'required|string|max:20',
            'nombre' => 'required|string|max:100'
        ]);
        return Labor::create($validated);
    }

    public function update(Request $request, $id)
    {
        $labor = Labor::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:100'
        ]);
        $labor->update($validated);
        return $labor;
    }

    public function destroy($id)
    {
        Labor::findOrFail($id)->delete();
        return response()->noContent();
    }
}
