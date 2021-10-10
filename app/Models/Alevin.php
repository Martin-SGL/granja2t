<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alevin extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad','precio_u'];

     //relación polimorfica uno a uno inversa
     public function gasto()
     {
         return $this->morphOne(Gasto::class,'gastoable');

     }
}
