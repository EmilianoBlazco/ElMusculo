<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexos = [
            'Masculino',
            'Femenino',
        ];


        foreach ($sexos as $sexo) {
            Genero::create([
                'generos' => $sexo,
            ]);
        }

    }
}
