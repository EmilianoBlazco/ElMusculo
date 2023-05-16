<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AutenticacionController extends Controller{

    public function registrar(){
        return view('autenticacion.registrar');
    }

    public function guardar(Request $request){


   /*     $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
        ]);*/

        $user = new User();


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
