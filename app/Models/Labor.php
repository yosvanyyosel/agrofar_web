<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    protected $table = 'labors';
    protected $primaryKey = 'id_labor';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_labor', 'nombre'
    ];

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_labor', 'id_labor');
    }

    public function habilidades()
    {
        return $this->hasMany(HabilidadTrabajador::class, 'tipo_labor', 'id_labor');
    }
}
