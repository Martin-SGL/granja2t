<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad_dias','salario_dia','total','lun','mar','mie','jue','vie','sab','dom','ini_sem','fin_sem'];

    //relación muchos a muchos 
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class);
    }
}
