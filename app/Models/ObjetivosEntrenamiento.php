<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivosEntrenamiento extends Model
{
    use HasFactory;

    protected $table = 'objetivo';

    protected $fillable = [
        'objetivos',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
