<?php

namespace Database\Seeders;

use App\Models\ObjetivosEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObjetivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $objetivos = [
            'Mejorar resistencia cardiovascular',
            'Ganar fuerza y masa muscular',
            'Perder peso y reducir grasa corporal',
            'Mejorar flexibilidad y movilidad',
            'Aumentar energía y vitalidad',
            'Mejorar postura y equilibrio muscular',
            'Reducir estrés y mejorar bienestar mental',
            'Aumentar confianza y autoestima',
            'Mejorar calidad del sueño',
            'Prevenir enfermedades crónicas',
            'Aumentar resistencia y rendimiento deportivo',
            'Mejorar coordinación y equilibrio',
            'Reducir riesgo de lesiones',
        ];

        foreach ($objetivos as $objetivo) {
            ObjetivosEntrenamiento::create([
                'objetivos' => $objetivo,
            ]);
        }

    }
}
