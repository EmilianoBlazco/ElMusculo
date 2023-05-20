<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasEntrenamiento extends Model
{
    use HasFactory;

    protected $table = 'dias_entrenamiento';

    /**
     * Get the users associated with the dias_entrenamiento.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'dias_entrenamiento_user', 'dias_entrenamiento_id', 'user_id');
    }
}
