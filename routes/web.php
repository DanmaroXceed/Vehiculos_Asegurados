<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicController;

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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [LoginController::class, 'acceder'])->name('loggear');


Route::middleware(['auth'])->group(function () {
    //  Salir
    Route::post('/logout', [LoginController::class, 'salir'])->name('logout');

    //  Home
    Route::get('/home', function () {return view('resumen');})->name('home');

    //  Usuarios
    Route::get('/us', [UserController::class, 'index'])->name('usuarios');

    //  Registrar usuarios
    Route::get('/us/registrar', function () { return view('reg_usuario'); })->name('registrar');
    Route::post('/us/registrar', [LoginController::class, 'registrar'])->name('guardar-nuevo-usuario');

    //  Vehiculos
    Route::get('/va', [VehicController::class, 'index'])->name('vehiculos');

    //  Registrar Vehiculo
    Route::get('/va/registrar', function () { return view('reg_vehiculo'); })->name('registrarVA');
    Route::post('/va/registrar', [VehicController::class, 'registrar'])->name('guardar-nuevo-VA');

});