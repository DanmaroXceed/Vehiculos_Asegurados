<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasif_vehi;
use App\Models\Tipo_vehi;
use App\Models\Marca;
use App\Models\Submarca;
use App\Models\Vehiculo;

class VehicController extends Controller
{
    public function index(Request $request){
        return view('vehiculos');
    }

    public function cargar_catalogos(Request $request){
        $clasific = Clasif_vehi::All();
        $marcas = Marca::All();
        return view('reg_vehiculo', compact('clasific','marcas'));
    }

    public function get_tipos($clasific_id) {
        return json_encode(Tipo_vehi::select('*')->where('clasific_id', $clasific_id)->get());
    }

    public function get_submarca($marca_id) {
        return json_encode(Submarca::select('*')->where('marca_id', $marca_id)->get());
    }

    public function registrar(Request $request){
        //  Validar los datos
        // $request -> validate([
        //     'nombre' => 'required',
        //     'correo' => 'required|email',
        //     'usuario' => 'required',
        //     'contra' => 'required',
        //     'password' => 'required|same:contra',
        // ]);
        
        $vehi = new Vehiculo();
        try {
            $vehi -> clasific_id = $request -> clasific_id;
            $vehi -> tipo_id = $request -> tipo_id;
            $vehi -> marca_id = $request -> marca_id;
            $vehi -> submarca_id = $request -> submarca_id;
            $vehi -> color = $request -> color;
            $vehi -> anio_mod = $request -> anio_mod;
            $vehi -> s_orig = $request -> s_orig;
            $vehi -> s_apo = $request -> s_apo;
            $vehi -> no_motor = $request -> no_motor;
            $vehi -> placas = $request -> placas;
            $vehi -> cond_vehi = $request -> cond_vehi;
            $vehi -> or_sob = $request -> or_sob;

            $vehi -> save();
            return redirect()->route('vehiculos');//->with('correcto', 'Usuario creado satisfactoriamente');
        } catch (\Illuminate\Database\QueryException $ex) {
            echo($ex);
        }
    }
}
