<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request){
        $list = User::select('users.*', 'cargos.descripcion as cdesc', 'unidads.descripcion as udesc', 'distritos.descripcion as ddesc')
        ->join('cargos', 'users.cargo_id', '=', 'cargos.id')
        ->join('unidads', 'users.unidad_id', '=', 'unidads.id')
        ->join('distritos', 'users.distrito_id', '=', 'distritos.id')
        ->get();
        return view('usuarios', ['list' => $list]);
    }
}
