<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alevin extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad','precio_u','gasto_id'];

    //relación uno a muchos inversa
    public function gasto()
    {
        return $this->belongsTo(Gasto::class);
        
    }
}
