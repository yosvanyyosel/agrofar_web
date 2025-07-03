<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\Tarea;
use App\Models\HabilidadTrabajador;
use App\Models\VacacionLicencia;

class GestorPersonalController extends Controller
{
    public function index()
    {
        $stats = [
            'Trabajadores' => Trabajador::count(),
            'Tareas' => Tarea::count(),
            'Habilidades' => HabilidadTrabajador::count(),
            'Vacaciones/Licencias' => VacacionLicencia::count(),
        ];

        return view('personal.dashboard', compact('stats'));
    }
}
