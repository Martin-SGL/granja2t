<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $fillable = ['fecha','total','recurso'];

    //relacion uno a muchos
    public function alimentos()
    {
        return $this->hasMany(Alimento::class);
    }

    //relacion uno a muchos
    public function alevins()
    {
        return $this->hasMany(Alevin::class);
    }

    //relacion uno a muchos
    public function energias()
    {
        return $this->hasMany(Energia::class);
    }

    //relacion uno a muchos
    public function varios()
    {
        return $this->hasMany(Vario::class);
    }
}
