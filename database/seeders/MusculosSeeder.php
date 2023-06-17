<?php

namespace Database\Seeders;

use App\Models\GrupoMuscular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Pecho
Espalda
Hombros
Brazos
Piernas
Abdominales
Glúteos
Pantorrillas
Trapecios
Músculos de la zona lumbar*/
        $musuclos = [
            'Pecho',
            'Espalda',
            'Hombros',
            'Brazos',
            'Piernas',
            'Abdominales',
            'Glúteos',
            'Pantorrillas',
            'Trapecios',
            'Músculos de la zona lumbar',
        ];

        foreach ($musuclos as $musculo) {
            GrupoMuscular::create([
                'nombre_gm' => $musculo,
            ]);
        }
    }
}
