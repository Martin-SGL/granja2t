<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;
    protected $fillable = ['tipo','precio_u','cantidad','gasto_id'];

    //relación uno a muchos inversa
    public function gasto()
    {
        return $this->belongsTo(Gasto::class);
        
    }    
    
}