<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $fillable = ['fecha','total','recurso','gastoable_id','gastoable_type'];

    //relacion polimorfica uno a uno
    public function gastoable()
    {
        return $this->morphTo();
    }

}
