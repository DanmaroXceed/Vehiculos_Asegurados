<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasif_vehi;
use App\Models\Tipo_vehi;

class VehicController extends Controller
{
    public function index(Request $request){
        return view('vehiculos');
    }

    public function cargar_catalogos(Request $request){
        $clasific = Clasif_vehi::All();
        return view('reg_vehiculo', ['clasific' => $clasific]);
    }

    public function get_tipos($clasific_id) {
        return json_encode(Tipo_vehi::select('*')->where('clasific_id', $clasific_id)->get());
    }

    public function registrar(Request $request){
        
    }
}
