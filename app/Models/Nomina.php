<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = ['semana','fecha_ini','total'];

    //relación muchos a muchos
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class)
            ->withPivot('cantidad_dias','salario_dia','lun','mar','mie','jue','vie','sab','dom','recurso')
            ->withTimestamps();
    }
}
