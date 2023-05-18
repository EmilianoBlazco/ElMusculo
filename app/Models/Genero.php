<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{

    protected $table = 'genero';
    use HasFactory;

    /**
     * Get the users associated with the genero.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
