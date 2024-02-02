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
    Route::get('/home', [VehicController::class, 'contarVehiculos'])->name('home');

    //  Usuarios
    Route::get('/us', [UserController::class, 'index'])->name('usuarios');

    //  Registrar usuarios
    Route::get('/us/registrar', [LoginController::class, 'index'])->name('registrar');
    Route::post('/us/registrar', [LoginController::class, 'registrar'])->name('guardar-nuevo-usuario');

    //  Vehiculos
    Route::get('/va', [VehicController::class, 'index'])->name('vehiculos');

    //  Registrar Vehiculo
    Route::get('/va/registrar', [VehicController::class, 'cargar_catalogos'])->name('registrarVA');
    Route::get('/get-tipo-v/{clasific_id}', [VehicController::class, 'get_tipos']);
    Route::get('/get-submarca-v/{marca_id}', [VehicController::class, 'get_submarca']);
    Route::get('/get-municipios/{id}', [VehicController::class, 'get_municipios']);
    Route::get('/get-localidades/{val}/{id}', [VehicController::class, 'get_localidades']);
    Route::get('/get-fotos/{id}', [VehicController::class, 'get_fotos']);
    Route::post('/va/registrar', [VehicController::class, 'registrar'])->name('guardar-nuevo-VA');

});