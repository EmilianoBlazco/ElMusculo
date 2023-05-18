<?php

namespace App\Http\Controllers;

use App\Models\DiasEntrenamiento;
use App\Models\Genero;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller{

    public function registrar(){

        $generos = Genero::get();
        $dias_entrenamiento = DiasEntrenamiento::get();

/*        dd($generos);*/

        return view('autenticacion.registrar',compact('generos','dias_entrenamiento'));
    }

    public function guardar(Request $request){


   /*     $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
        ]);*/

        $user = new User();
        $user->tipo_usuario = $request->tipo_usuario;
        $user->password = bcrypt($request->password);
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->dni = $request->dni;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->actividad_fisica = $request->actividad_fisica;
        $user->peso = $request->peso;
        $user->altura = $request->altura;
        $user->condicion_medica = $request->condicion_medica;
        $user->email = $request->correo;
        $user->telefono = $request->telefono;
        $user->fecha_inicio = $request->fecha_inicio;
        $user->genero_id = $request->genero;

        //escribir en la tabal dias de entrenamiento

        dd($request->all(),$user);


        return redirect()->route('aut.login')->with('mensaje','Usuario registrado exitosamente');
    }

    public function login(){
        return view('autenticacion.login');
    }

    public function loging(Request $request){
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $credenciales = $request->only('email','password');

        if(Auth::attempt($credenciales)){
            return redirect()->route('numerosAleatorios.indexF');
        }else{
            return redirect()->route('aut.login')->with('mensaje','Credenciales incorrectas');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('aut.login')->with('mensaje','Sesion cerrada exitosamente');
    }

}
