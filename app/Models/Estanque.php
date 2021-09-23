<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estanque extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre','tipo'];

    //relacion uno a muchos
    public function mermas()
    {
        return $this->hasMany(Merma::class);
    }

    //relacion uno a muchos
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }

}
