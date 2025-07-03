<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id_area';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_area', 'nombre', 'superficie_ha'
    ];

    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'area_id', 'id_area');
    }
}
