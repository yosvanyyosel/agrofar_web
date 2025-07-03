<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacacionLicencia extends Model
{
    protected $table = 'vacacion_licencias';
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = [
        'id_trabajador', 'fecha_inicio', 'fecha_fin', 'tipo_ausencia', 'motivo'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador', 'id_trabajador');
    }
}
