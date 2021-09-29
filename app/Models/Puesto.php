<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','Lu','Ma','Mi','Ju','Vi','Sa','Do'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
