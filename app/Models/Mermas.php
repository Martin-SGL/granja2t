<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mermas extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad','fecha','estanque_id'];

    //relacin uno a muchos inversa
    public function estanque()
    {
        return $this->belongsTo(Estanque::class);
    }
}
