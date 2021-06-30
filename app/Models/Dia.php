<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;
    protected $fillable = ['fecha'];

    //relación muchos a muchos 
    public function nominas()
    {
        return $this->belongsToMany(Nomina::class);
    }
}
