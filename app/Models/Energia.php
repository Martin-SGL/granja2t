<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energia extends Model
{
    use HasFactory;

    protected $fillable = ['blower','pozo','domestica'];

    //relación polimorfica uno a uno inversa
    public function gasto()
    {
        return $this->morphOne(Gasto::class,'gastoable');

    }
}
