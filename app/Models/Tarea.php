<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tareas';
    protected $primaryKey = 'id_tarea';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id_trabajador', 'id_labor', 'id_produccion', 'fecha_inicio', 'fecha_fin'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador', 'id_trabajador');
    }

    public function labor()
    {
        return $this->belongsTo(Labor::class, 'id_labor', 'id_labor');
    }

    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'id_produccion', 'id_produccion');
    }

    public function usoMaquinarias()
    {
        return $this->hasMany(UsoMaquinaria::class, 'id_tarea', 'id_tarea');
    }

    public function usoQuimicos()
    {
        return $this->hasMany(UsoQuimico::class, 'id_tarea', 'id_tarea');
    }
}
