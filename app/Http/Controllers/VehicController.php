<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicController extends Controller
{
    public function index(Request $request){
        return view('vehiculos');
    }

    public function registrar(Request $request){
        
    }
}
