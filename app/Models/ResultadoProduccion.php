<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadoProduccion extends Model
{
    protected $table = 'resultados_produccions';
    protected $primaryKey = 'id_produccion';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_produccion', 'cantidad_producida', 'unidad_medida', 'fecha_cosecha', 'destino'
    ];

    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'id_produccion', 'id_produccion');
    }
}
