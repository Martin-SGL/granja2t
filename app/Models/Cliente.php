<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','calle','telefono','numero','negocio','municipio_estado'];

    //relacion uno a muchos
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
