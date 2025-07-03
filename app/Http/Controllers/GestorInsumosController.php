<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quimico;
use App\Models\UsoQuimico;
use App\Models\Maquinaria;
use App\Models\MantenimientoMaquinaria;
use App\Models\UsoMaquinaria;

class GestorInsumosController extends Controller
{
    public function index()
    {
        $stats = [
            'Químicos' => Quimico::count(),
            'Uso de Químico' => UsoQuimico::count(),
            'Maquinarias' => Maquinaria::count(),
            'Mantenimientos' => MantenimientoMaquinaria::count(),
            'Uso de Maquinaria' => UsoMaquinaria::count(),
        ];

        return view('insumos.dashboard', compact('stats'));
    }
}
