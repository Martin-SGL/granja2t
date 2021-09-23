<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['kilos','piezas','fecha','precio','total','cliente_id','estanque_id'];

    //relación uno a muchos inversa
    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    //relación uno a muchos inversa
    public function estanque()
    {
        return $this->belongsTo(Estanque::class);
    }

    
}
