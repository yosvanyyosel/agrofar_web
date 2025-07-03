<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produccion;
use App\Models\ResultadoProduccion;

class AnalistaController extends Controller
{
    public function index()
    {
        $stats = [
            'Producciones' => Produccion::count(),
            'Resultados' => ResultadoProduccion::count(),
        ];

        return view('analista.dashboard', compact('stats'));
    }
}
