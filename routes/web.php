<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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


Route::get('/1', function () {
    return view('reg_vehiculo');
});



Route::middleware(['auth'])->group(function () {
    //  Salir
    Route::post('/logout', [LoginController::class, 'salir'])->name('logout');

    //  Home
    Route::get('home', function () {return view('home');})->name('home');

    //  Registrar usuarios
    Route::get('/registrar', function () { return view('reg_usuario'); })->name('registrar');
    Route::post('/registrar', [LoginController::class, 'registrar'])->name('guardar-nuevo-usuario');
});