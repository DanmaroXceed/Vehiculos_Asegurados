<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Localidad;
use App\Models\Lugar;

class VehicController extends Controller
{
    public function index(Request $request){
        $vehiculos = Vehiculo::select(
        'vehiculos.*', 
        'clasific_vehi.descripcion as clasificacion', 
        'tipo_vehi.descripcion as tipo', 
        'marcas.descripcion as marca', 
        'submarcas.descripcion as submarca')
        ->join('clasific_vehi', 'vehiculos.clasific_id', '=', 'clasific_vehi.id')
        ->join('tipo_vehi', 'vehiculos.tipo_id', '=', 'tipo_vehi.id')
        ->join('marcas', 'vehiculos.marca_id', '=', 'marcas.id')
        ->join('submarcas', 'vehiculos.submarca_id', '=', 'submarcas.id')
        ->get();

        $aseguramientos = Aseguramiento::select(
            'aseguramientos.*', 
            'motivos.descripcion as motivo', 
            'autoridades.descripcion as autoridad', 
            'fuentes_info.descripcion as fuenteinfo', 
            'formas_robo.descripcion as formarobo',
            'datos_robo.lugar as lugarR',
            'datos_robo.fecha as fechaR')
            ->join('motivos', 'aseguramientos.motivo_id', '=', 'motivos.id')
            ->join('autoridades', 'aseguramientos.autoridad_as_id', '=', 'autoridades.id')
            ->join('datos_robo', 'aseguramientos.datos_robo_id', '=', 'datos_robo.id')
            ->join('fuentes_info', 'datos_robo.fuente_id', '=', 'fuentes_info.id')
            ->join('formas_robo', 'datos_robo.forma_robo_id', '=', 'formas_robo.id')
            ->get();

        $lugares = DB::select(
            'select lugares.*, 
            estados.descripcion as est,
            municipios.descripcion as mun,
            localidades.descripcion as loc
            from lugares
            inner join estados on estados.id = lugares.est_id
            inner join municipios on municipios.mun_id = lugares.mun_id
            inner join localidades on localidades.loc_id = lugares.loc_id
            where localidades.est_id = lugares.est_id
            and localidades.mun_id = lugares.mun_id
            and localidades.loc_id = lugares.loc_id'
        );
        
        return view('vehiculos', compact('vehiculos', 'aseguramientos', 'lugares'));
    }

    public function contarVehiculos(){
        $vehiculos = DB::scalar(
            "select count(id) from vehiculos"
        );
        return view('resumen', compact('vehiculos'));

    }

    public function cargar_catalogos(Request $request){
        $clasific = Clasif_vehi::All();
        $marcas = Marca::All();
        $motivos = Motivo::All();
        $autoridades = Autoridad::All();
        $formasrobo = FormaRobo::where('id', '>', 1)->get();
        $fuentesinfo = FuenteInfo::where('id', '>', 1)->get();
        $estados = Estado::All();
        return view('reg_vehiculo', compact('clasific','marcas', 'motivos', 'autoridades','formasrobo','fuentesinfo', 'estados'));
    }

    public function get_tipos($clasific_id) {
        return json_encode(Tipo_vehi::select('*')->where('clasific_id', $clasific_id)->get());
    }

    public function get_submarca($marca_id) {
        return json_encode(Submarca::select('*')->where('marca_id', $marca_id)->get());
    }

    public function get_municipios($id) {
        if($id < 10){
            $id = '0'+ $id;
        }
        return json_encode(Municipio::select('*')->where('est_id', $id)->orderBy('descripcion')->get());
    }

    public function get_localidades($mun, $est) {
        if($mun < 10){
            $mun = '000'+ $mun;
        }elseif($mun < 100){
            $mun = '00'+ $mun;
        }
        return json_encode(Localidad::select('*')
            ->where('mun_id', $mun)
            ->where('est_id', $est)
            ->orderBy('descripcion')->get());
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
        $lugar = new Lugar();

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

            //$vehi -> save();

            if($request -> motivo_id == 1){
                $datos_r -> fuente_id = $request -> fuente_id;
                $datos_r -> lugar = $request -> lugarrobo;
                $datos_r -> fecha = $request -> fecharobo;
                $datos_r -> forma_robo_id = $request -> forma_robo_id;

                //$datos_r -> save();
            }else{
                $datos_r -> id = 1;
            }

            $aseg -> motivo_id = $request -> motivo_id;
            $aseg -> autoridad_as_id = $request -> autoridad_as_id;
            $aseg -> personas = $request -> personas;
            $aseg -> deposito = $request -> deposito;
            $aseg -> fecha = $request -> fecha;
            $aseg -> datos_robo_id = $datos_r -> id;

            //$aseg -> save();
            
            $lugar -> est_id = $request -> est_id < 10 ? '0' . $request -> est_id : $request -> est_id;
            $lugar -> mun_id = $request -> municipio;
            $lugar -> loc_id = $request -> localidad;
            $lugar -> calle = $request -> calle;
            $lugar -> numero = $request -> numero;
            $lugar -> colonia = $request -> colonia;

            //$lugar -> save();

            //return redirect()->route('vehiculos');//->with('correcto', 'Usuario creado satisfactoriamente');
        } catch (\Illuminate\Database\QueryException $ex) {
            echo($ex);
        }
    }
}
