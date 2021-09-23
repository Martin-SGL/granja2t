<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre','telefono','calle','numero','municipio_estado','puesto','salario_dia','estatus'];

    //relación uno a muchos
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    //relación muchos a muchos 
    public function nominas()
    {
        return $this->belongsToMany(Nomina::class);
    }
}
