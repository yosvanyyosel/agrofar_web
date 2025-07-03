<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabilidadTrabajador extends Model
{
    protected $table = 'habilidad_trabajadors';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_trabajador', 'tipo_labor'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador', 'id_trabajador');
    }

    public function labor()
    {
        return $this->belongsTo(Labor::class, 'tipo_labor', 'id_labor');
    }
}
