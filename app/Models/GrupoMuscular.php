<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMuscular extends Model
{
    use HasFactory;

    protected $table = 'grupos_musculares';

    protected $fillable=[
      'nombre_gm'
    ];

    public function ejercicios()
    {
        return $this->belongsToMany(Ejercicio::Class,'ejercicios_grupos_musculares','grupos_musculares_id','ejercicios_id');
    }
}
