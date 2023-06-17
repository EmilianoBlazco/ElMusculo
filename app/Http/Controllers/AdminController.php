<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        //TODO: terminar paginacion
            $usuariosActivos = User::where('estado_cuenta',1)->paginate(10);
            $usuariosInactivos = User::where('estado_cuenta',0)->paginate(10);

        return view('admin.usuarios.index',compact('usuariosActivos','usuariosInactivos'));

    }

    public function update(Request $request, $user){

        if ($request->input('baja') == 1) {

            $usuario = User::get()->where('id', $user)->first();

            $usuario->estado_cuenta = 0;
            $usuario->save();

            if ($usuario->id === auth()->id()) {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('aut.login')->with('baja', 'ok');
            }

            return redirect()->back()->with('baja', 'ok');

        }elseif ($request->input('alta') == 1) {

            $usuario = User::get()->where('id',$user)->first();

            $usuario->estado_cuenta = 1;
            $usuario->fecha_inicio = date('Y-m-d');
            $usuario->save();

            return redirect()->back()->with('alta', 'ok');
        }

    }

    public function destroy($user){

        $usuario = User::get()->where('id',$user)->first();

        $usuario->delete();

        return redirect()->back()->with('eliminar','ok');
    }
}
