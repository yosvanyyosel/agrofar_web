<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    protected $primaryKey = 'id_trabajador';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_trabajador', 'nombre', 'apellidos', 'fecha_nacimiento', 'escolaridad', 'cargo', 'salario_mensual'
    ];

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_trabajador', 'id_trabajador');
    }

    public function habilidades()
    {
        return $this->hasMany(HabilidadTrabajador::class, 'id_trabajador', 'id_trabajador');
    }

    public function ausencias()
    {
        return $this->hasMany(VacacionLicencia::class, 'id_trabajador', 'id_trabajador');
    }
}
