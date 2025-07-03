<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsoQuimico extends Model
{
    protected $table = 'uso_quimicos';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_tarea', 'nombre_quimico', 'dosis_ha', 'area_aplicada_ha'
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'id_tarea', 'id_tarea');
    }

    public function quimico()
    {
        return $this->belongsTo(Quimico::class, 'nombre_quimico', 'nombre');
    }
}
