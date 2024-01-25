<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasif_vehi;
use App\Models\Tipo_vehi;
use App\Models\Marca;
use App\Models\Submarca;
use App\Models\Vehiculo;
use App\Models\Motivo;
use App\Models\Autoridad;
use App\Models\FormaRobo;
use App\Models\FuenteInfo;
use App\Models\Aseguramiento;
use App\Models\DatosRobo;

class VehicController extends Controller
{
    public function index(Request $request){
        return view('vehiculos');
    }

    public function cargar_catalogos(Request $request){
        $clasific = Clasif_vehi::All();
        $marcas = Marca::All();
        $motivos = Motivo::All();
        $autoridades = Autoridad::All();
        $formasrobo = FormaRobo::where('id', '>', 1)->get();
        $fuentesinfo = FuenteInfo::where('id', '>', 1)->get();
        return view('reg_vehiculo', compact('clasific','marcas', 'motivos', 'autoridades','formasrobo','fuentesinfo'));
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
        $aseg = new Aseguramiento();
        $datos_r = new DatosRobo();

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

            if($request -> motivo_id == 1){
                $datos_r -> fuente_id = $request -> fuente_id;
                $datos_r -> lugar = $request -> lugarrobo;
                $datos_r -> fecha = $request -> fecharobo;
                $datos_r -> forma_robo_id = $request -> forma_robo_id;

                $datos_r -> save();
            }else{
                $datos_r -> id = 1;
            }

            $aseg -> motivo_id = $request -> motivo_id;
            $aseg -> autoridad_as_id = $request -> autoridad_as_id;
            $aseg -> personas = $request -> personas;
            $aseg -> deposito = $request -> deposito;
            $aseg -> fecha = $request -> fecha;
            $aseg -> datos_robo_id = $datos_r -> id;

            $aseg -> save();
            return redirect()->route('vehiculos');//->with('correcto', 'Usuario creado satisfactoriamente');
        } catch (\Illuminate\Database\QueryException $ex) {
            echo($ex);
        }
    }
}
