<?php

namespace Database\Seeders;

use App\Models\DiasEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiasEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dias = [
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
        ];

        foreach ($dias as $dia) {
            DiasEntrenamiento::create([
                'dias' => $dia,
            ]);
        }
    }
}
