<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quimico extends Model
{
    protected $table = 'quimicos';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nombre', 'tipo', 'unidad_medida', 'cantidad_disponible', 'precio_unitario', 'dosis_maxima_ha'
    ];

    public function usos()
    {
        return $this->hasMany(UsoQuimico::class, 'nombre_quimico', 'nombre');
    }
}
