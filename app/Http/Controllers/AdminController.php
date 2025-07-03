<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Trabajador;
use App\Models\Labor;
use App\Models\HabilidadTrabajador;
use App\Models\Maquinaria;
use App\Models\MantenimientoMaquinaria;
use App\Models\Produccion;
use App\Models\Quimico;
use App\Models\Tarea;
use App\Models\UsoMaquinaria;
use App\Models\UsoQuimico;
use App\Models\ResultadoProduccion;
use App\Models\VacacionLicencia;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'Áreas' => Area::count(),
            'Trabajadores' => Trabajador::count(),
            'Labores' => Labor::count(),
            'Habilidades' => HabilidadTrabajador::count(),
            'Maquinarias' => Maquinaria::count(),
            'Mantenimientos' => MantenimientoMaquinaria::count(),
            'Producciones' => Produccion::count(),
            'Químicos' => Quimico::count(),
            'Tareas' => Tarea::count(),
            'Uso Maquinaria' => UsoMaquinaria::count(),
            'Uso Químico' => UsoQuimico::count(),
            'Resultados' => ResultadoProduccion::count(),
            'Vacaciones/Licencias' => VacacionLicencia::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
