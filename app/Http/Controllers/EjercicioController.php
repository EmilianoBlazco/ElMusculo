<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\GrupoMuscular;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index()
    {
        $ejercicios = Ejercicio::get();

        return view('ejercicio.index',compact('ejercicios'));
    }

    public function create()
    {

        $musculos = GrupoMuscular::get();

        return view('ejercicio.create',compact('musculos'));
    }

    public function store(Request $request)
    {
        $ejercicio = Ejercicio::create($request->all());

        $ejercicio->grupoMuscular()->attach($request->musculos);

        return redirect()->route('ejercicios.index')->with('crear','ok');
    }

    public function show($ejercicio)
    {
        return view('ejercicio.show',compact('ejercicio'));
    }

    public function edit($ejercicio)
    {
        $ejercicio = Ejercicio::find($ejercicio);

        $musculos = GrupoMuscular::get();

        return view('ejercicio.edit',compact('ejercicio','musculos'));
    }

    public function update(Request $request, $ejercicio)
    {
        $ejercicio = Ejercicio::find($ejercicio);

        $ejercicio->update($request->all());

        $ejercicio->grupoMuscular()->sync($request->musculos);

        return redirect()->route('ejercicios.index')->with('editar','ok');
    }

    public function destroy($ejercicio)
    {

        $ejer = Ejercicio::find($ejercicio);

        // Eliminar las filas relacionadas en la tabla Ejercicios_Grupos_Musculares
        $ejer->grupoMuscular()->detach();

        $ejer->delete();

        return redirect()->route('ejercicios.index')->with('eliminar','ok');
    }
}
