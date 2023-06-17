<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_usuario',
        'password',
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'actividad_fisica',
        'peso',
        'altura',
        'condicion_medica',
        'email',
        'telefono',
        'fecha_inicio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'actividad_fisica' => 'boolean',
    ];

    /**
     * Get the genero associated with the user.
     */
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    /**
     * Get the dias_entrenamiento associated with the user.
     */

    public function diasEntrenamiento()
    {
        return $this->belongsToMany(DiasEntrenamiento::class, 'dias_entrenamiento_user', 'user_id', 'dias_entrenamiento_id');
    }

    /**
     * Get the objetivos_entrenamiento associated with the user.
     */

    public function objetivosEntrenamiento()
    {
        return $this->belongsToMany(ObjetivosEntrenamiento::class, 'objetivo_user', 'user_id', 'objetivo_id');
    }
}
