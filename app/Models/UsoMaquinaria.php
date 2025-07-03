<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsoMaquinaria extends Model
{
    protected $table = 'uso_maquinarias';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_maquinaria', 'id_tarea', 'combustible_consumido'
    ];

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class, 'id_maquinaria', 'id_maquinaria');
    }

    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'id_tarea', 'id_tarea');
    }
}
