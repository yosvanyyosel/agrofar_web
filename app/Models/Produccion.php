<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccions';
    protected $primaryKey = 'id_produccion';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_produccion', 'area_id', 'cultivo', 'variedad', 'estado'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id_area');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'id_produccion', 'id_produccion');
    }

    public function resultado()
    {
        return $this->hasOne(ResultadoProduccion::class, 'id_produccion', 'id_produccion');
    }
}
