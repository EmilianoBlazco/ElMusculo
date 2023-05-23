<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteEntrenadorController;
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

//Ruta de administrador para eliminar usuarios
Route::get('/usuarios', [AdminController::class,'index'])->middleware('auth')->name('admin.index');//Ruta para eliminar el perfil del usuario
Route::patch('/usuarios/{usuarios}', [AdminController::class,'update'])->middleware('auth')->name('admin.usuarios.update');//Ruta para dar de alta el perfil del usuario
Route::delete('/usuarios/{usuarios}', [AdminController::class,'destroy'])->middleware('auth')->name('admin.usuarios.destroy');//Ruta para dar de alta el perfil del usuario


//Rutas general
/*Route::get('/index', [AutenticacionController::class,'principal'])->name('');*/
