<?php

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

//Rutas general
/*Route::get('/index', [AutenticacionController::class,'principal'])->name('');*/
