<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','telefono','calle','numero','municipio_estado','puesto','salario_dia','estatus'];

    //relación uno a muchos
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    //releacion uno a muchos
    public function nominas()
    {
        return $this->hasMany(Nomina::class);
    }
}
