<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MantenimientoMaquinaria extends Model
{
    protected $table = 'mantenimiento_maquinarias';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_maquinaria', 'inicio', 'fin', 'costo'
    ];

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'id_maquinaria', 'id_maquinaria');
    }
}
