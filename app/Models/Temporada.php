<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = ['tipo','fecha','empleado_id'];

    //relación uno a muchos inversa
    public function empleado()
    {
        return $this->belongsTo(Temporada::class);
    }
}
