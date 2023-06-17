<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteEntrenadorController;
use App\Http\Controllers\EjercicioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutenticacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/', function () {
    return view('welcome');
});*/

//Pagina de inicio
Route::get('/', function () {
    return view('inicio');
})->name('inicio');
//Rutas de autenticacion
Route::get('/registrar', [AutenticacionController::class,'registrar'])->name('aut.registrar');//Ruta para mostrar el formulario de registro
Route::post('/registrando', [AutenticacionController::class,'guardar'])->name('aut.guardar');//Ruta para guardar el registro
Route::get('/login', [AutenticacionController::class,'login'])->name('aut.login');//Ruta para mostrar el formulario de login
Route::post('/loging', [AutenticacionController::class,'loging'])->name('aut.loging');//Ruta para logearse
Route::get('/logout', [AutenticacionController::class,'logout'])->name('aut.logout');//Ruta para cerrar sesion

//Ruta de funcionalidades genrales
//TODO: verificar middleware
Route::get('/principal', [ClienteEntrenadorController::class,'index'])->middleware('auth')->name('principal');//Ruta para mostrar la pagina principal
//Ruta para administrar el perfil
Route::get('perfil/{perfil}/edit', [ClienteEntrenadorController::class,'perfil_edit'])->middleware('auth')->name('perfil.edit');//Ruta para mostrar el perfil del usuario
Route::patch('/perfil/{perfil}', [ClienteEntrenadorController::class,'perfil_update'])->middleware('auth')->name('perfil.update');//Ruta para modficiar el perfil del usuario
Route::get('/perfil/{perfil}/obj', [ClienteEntrenadorController::class,'obj'])->middleware('auth')->name('perfil.obj');//Ruta para mostrar los objetivos del usuario
Route::patch('/perfil/{perfil}/obj', [ClienteEntrenadorController::class,'obj_update'])->middleware('auth')->name('perfil.obj.update');//Ruta para modificar los objetivos del usuario

//Ruta de administrador para eliminar usuarios
Route::get('/usuarios', [AdminController::class,'index'])->middleware('auth')->name('admin.index');//Ruta para eliminar el perfil del usuario
Route::patch('/usuarios/{usuarios}', [AdminController::class,'update'])->middleware('auth')->name('admin.usuarios.update');//Ruta para dar de alta el perfil del usuario
Route::delete('/usuarios/{usuarios}', [AdminController::class,'destroy'])->middleware('auth')->name('admin.usuarios.destroy');//Ruta para dar de alta el perfil del usuario

//Ruta de ejercicios
Route::get('/ejercicios', [EjercicioController::class,'index'])->middleware('auth')->name('ejercicios.index');//Ruta para mostrar los ejercicios
Route::get('/ejercicios/create', [EjercicioController::class,'create'])->middleware('auth')->name('ejercicios.create');//Ruta para mostrar el formulario de creacion de ejercicios
Route::post('/ejercicios', [EjercicioController::class,'store'])->middleware('auth')->name('ejercicios.store');//Ruta para guardar el ejercicio
Route::get('/ejercicios/{ejercicio}/edit', [EjercicioController::class,'edit'])->middleware('auth')->name('ejercicios.edit');//Ruta para mostrar el formulario de edicion de ejercicios
Route::patch('/ejercicios/{ejercicio}', [EjercicioController::class,'update'])->middleware('auth')->name('ejercicios.update');//Ruta para modificar el ejercicio
Route::delete('/ejercicios/{ejercicio}', [EjercicioController::class,'destroy'])->middleware('auth')->name('ejercicios.destroy');//Ruta para eliminar el ejercicio


//Rutas general
/*Route::get('/index', [AutenticacionController::class,'principal'])->name('');*/


