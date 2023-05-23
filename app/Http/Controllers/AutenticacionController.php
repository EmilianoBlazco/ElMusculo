<?php

namespace App\Http\Controllers;

use App\Models\DiasEntrenamiento;
use App\Models\Genero;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutenticacionController extends Controller{

    public function registrar(){

        $generos = Genero::get();
        $dias_entrenamiento = DiasEntrenamiento::get();

/*        dd($generos);*/

        return view('autenticacion.registrar',compact('generos','dias_entrenamiento'));
    }

    public function guardar(Request $request){

        // Verificar si existe una cuenta deshabilitada con los datos proporcionados
        $usuarioExistente = User::get()->where('dni', trim($request->dni))
            ->where('estado_cuenta', 0)
            ->first();

        if ($usuarioExistente) {
            // Si se encuentra una cuenta deshabilitada, redireccionar con un mensaje de error
            return redirect()->route('aut.login')->with('registro', 'existe');
        }else {
            // Si no se encuentra una cuenta deshabilitada, continuar con el proceso de login

            /*     $request->validate([
                     'name' => 'required|max:255',
                     'email' => 'required|max:255|unique:users',
                     'password' => 'required|max:255',
                 ]);*/

            $user = new User();
            $user->tipo_usuario = $request->tipo_usuario;
            $user->password = Hash::make($request->password);
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

            $user->save();

            Auth::login($user);

            //almacenar los dias de entrenamiento
            $user->diasEntrenamiento()->attach($request->input('dias'));
/*            dd($request->all());*/
            return redirect()->route('principal')->with('registro', 'ok');
        }
    }

    public function login(){
        return view('autenticacion.login');
    }

    public function loging(Request $request){

        // Verificar si existe una cuenta deshabilitada con los datos proporcionados
        $usuarioExistente = User::get()->where('dni', trim($request->dni))
            ->where('estado_cuenta', 0)
            ->first();

/*        dd($request->all(),$usuarioExistente);*/

        if ($usuarioExistente) {
            // Si se encuentra una cuenta deshabilitada, redireccionar con un mensaje de error
            return redirect()->route('aut.login')->with('login', 'existe');
        }else{
            // Si no se encuentra una cuenta deshabilitada, continuar con el proceso de login

            //validaciones

            $credenciales = $request->only('dni','password');

            if(Auth::attempt($credenciales)){

                $request->session()->regenerate();

                return redirect()->intended(route('principal'))->with('login','ok');

            }else{
                return redirect()->route('aut.login')->with('login','no');
            }
        }

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('aut.login');
    }

}
