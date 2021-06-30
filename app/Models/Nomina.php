<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad_dias','salario_dia','total','recurso','empleado_id'];

    //relación uno a muchos inversa
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    //relación muchos a muchos 
    public function dias()
    {
        return $this->belongsToMany(Dia::class);
    }
}
