<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vario extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','gasto_id'];

     //relación polimorfica uno a uno inversa
     public function gasto()
     {
         return $this->morphOne(Gasto::class,'gastoable')->withTimestamps();;

     }
}
