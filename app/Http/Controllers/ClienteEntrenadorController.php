<?php

namespace App\Http\Controllers;

use App\Models\DiasEntrenamiento;
use App\Models\Genero;
use App\Models\ObjetivosEntrenamiento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteEntrenadorController extends Controller
{

    public function index(){

        return view('welcome');
    }

    public function perfil_edit($perfil){


        $usuario = User::get()->where('id',auth()->user()->id)->first();

        $generos = Genero::get();
        $dias_entrenamiento = DiasEntrenamiento::get();

        return view('perfil.edit',compact('usuario','generos','dias_entrenamiento'));
    }

    public function obj(){

        $usuario = User::get()->where('id',auth()->user()->id)->first();
        $objetivos = ObjetivosEntrenamiento::get();

        return view('perfil.editObj',compact('objetivos','usuario'));
    }

    public function obj_update(Request $request, $perfil){

        $user = User::get()->where('id',$perfil)->first();
        $user->objetivosEntrenamiento()->sync($request->input('objetivos'));

        return redirect()->back()->with('editar','ok');
    }

    public function perfil_update(Request $request, $perfil)
    {

        if($request->input('actualizar') == 1){
            // Validar los datos recibidos del formulario
            /*$request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'telefono' => 'required',
                'fecha_nacimiento' => 'required',
            ]);*/

            // Obtener el perfil del usuario actual
            $user = Auth::user();

            // Actualizar los datos del perfil con los valores del formulario
            $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->dni = $request->dni;
            $user->fecha_nacimiento = date('Y-m-d',strtotime($request->fecha_nacimiento));
            $user->actividad_fisica = $request->actividad_fisica;
            $user->peso = $request->peso;
            $user->altura = $request->altura;
            $user->condicion_medica = $request->condicion_medica;
            $user->email = $request->email;
            $user->telefono = $request->telefono;
            $user->fecha_inicio = $request->fecha_inicio;
            $user->genero_id = $request->genero;

    /*        dd($request->all(),$user,$perfil);*/
            // Guardar los cambios en el perfil
            $user->save();

            $user->diasEntrenamiento()->sync($request->input('dias'));

            // Redireccionar una respuesta de éxito
            return redirect()->back()->with('editar','ok');
        }elseif($request->input('baja') == 1){

            $user = Auth::user();
            $user->estado_cuenta = 0;
            $user->save();

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('aut.login')->with('baja','ok');

        }
    }

}
