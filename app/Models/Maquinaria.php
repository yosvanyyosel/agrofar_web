<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $table = 'maquinarias';
    protected $primaryKey = 'id_maquinaria';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_maquinaria', 'tipo', 'consumo_promedio', 'estado'
    ];

    public function mantenimientos()
    {
        return $this->hasMany(MantenimientoMaquinaria::class, 'id_maquinaria', 'id_maquinaria');
    }

    public function usos()
    {
        return $this->hasMany(UsoMaquinaria::class, 'id_maquinaria', 'id_maquinaria');
    }
}
