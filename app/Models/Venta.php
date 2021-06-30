<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['kilos','piezas','fecha','precio','cliente_id'];

    //relación uno a muchos inversa
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    //relacion muchos a muchos
    public function estanques()
    {
        return $this->belongsToMany(Estanque::class);
    }
}
