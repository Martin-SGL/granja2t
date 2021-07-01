<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre','calle','telefono','numero','negocio','municipio_estado'];

    //relacion uno a muchos
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
