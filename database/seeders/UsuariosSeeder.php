<?php

namespace Database\Seeders;

use App\Models\DiasEntrenamiento;
use App\Models\Genero;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new User();

        $usuario->estado_cuenta = 1;
        $usuario->tipo_usuario = 1;
        $usuario->password = bcrypt('123');
        $usuario->nombre = 'Emi';
        $usuario->apellido = 'Blazco';
        $usuario->dni = '45';
        $usuario->fecha_nacimiento = '2001-11-20';
        $usuario->actividad_fisica = 0;
        $usuario->peso = 70;
        $usuario->altura = 1.70;
        $usuario->condicion_medica = 'Ninguna';
        $usuario->email = 'e@gmail.com';
        $usuario->telefono = '123456789';
        $usuario->email_verified_at = now();
        $usuario->fecha_inicio = now();
        $usuario->genero_id = 1;

        $usuario->save();

        $usuario->diasEntrenamiento()->attach(1);
        $usuario->diasEntrenamiento()->attach(3);
        $usuario->diasEntrenamiento()->attach(5);

        $usuario->objetivosEntrenamiento()->attach(1);
        $usuario->objetivosEntrenamiento()->attach(3);
        $usuario->objetivosEntrenamiento()->attach(4);
        $usuario->objetivosEntrenamiento()->attach(6);
        $usuario->objetivosEntrenamiento()->attach(10);
    }
}
