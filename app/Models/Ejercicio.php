<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicios';

    protected $fillable=[
      'nombre',
      'descripcion'
    ];

    public function grupoMuscular()
    {
        return $this->belongsToMany(GrupoMuscular::Class,'ejercicios_grupos_musculares','ejercicios_id','grupos_musculares_id');
    }
}
