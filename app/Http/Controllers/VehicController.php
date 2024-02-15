<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
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
use App\Models\Delito;
use App\Models\Recibimiento;
use App\Models\Registro;
use App\Models\Foto;

class VehicController extends Controller
{
    public function index(Request $request){
        $registros = DB::table('registros')
        ->select(
            'registros.id',
            'registros.elemento',
            'registros.fecha as fecha_reg',
                'cargos.descripcion as cargo',
                'unidads.descripcion as unidad',
                'distritos.descripcion as distrito',
            'vehiculos.color',
            'vehiculos.anio_mod',
            'vehiculos.s_orig',
            'vehiculos.s_apo',
            'vehiculos.no_motor',
            'vehiculos.placas',
            'vehiculos.cond_vehi',
            'vehiculos.or_sob',
                'clasific_vehi.descripcion as clasificacion',
                'tipo_vehi.descripcion as tipo',
                'marcas.descripcion as marca',
                'submarcas.descripcion as submarca',
            'aseguramientos.personas',
            'aseguramientos.deposito',
            'aseguramientos.fecha as fecha_as',
                'motivos.descripcion as motivo',
                'autoridades.descripcion as autoridad',
                'fuentes_info.descripcion as fuenteinfo',
                'formas_robo.descripcion as formarobo',
                'datos_robo.lugar as lugarR',
                'datos_robo.fecha as fechaR',
            'lugares.calle',
            'lugares.numero',
            'lugares.colonia',
                'estados.descripcion as est',
                'municipios.descripcion as mun',
                'localidades.descripcion as loc',
            'recibimientos.aut_rec',
            'recibimientos.titular',
            'recibimientos.cpet_inv',
                'delitos.descripcion as delito'
        )
            ->join('cargos', 'registros.cargo_id', '=', 'cargos.id')
            ->join('unidads', 'registros.cargo_id', '=', 'unidads.id')
            ->join('distritos', 'registros.cargo_id', '=', 'distritos.id')
        ->join('vehiculos', 'registros.vehiculo_id', '=', 'vehiculos.id')
            ->join('clasific_vehi', 'vehiculos.clasific_id', '=', 'clasific_vehi.id')
            ->join('tipo_vehi', 'vehiculos.tipo_id', '=', 'tipo_vehi.id')
            ->join('marcas', 'vehiculos.marca_id', '=', 'marcas.id')
            ->join('submarcas', 'vehiculos.submarca_id', '=', 'submarcas.id')
        ->join('aseguramientos', 'registros.aseguramiento_id', '=', 'aseguramientos.id')
            ->join('motivos', 'aseguramientos.motivo_id', '=', 'motivos.id')
            ->join('autoridades', 'aseguramientos.autoridad_as_id', '=', 'autoridades.id')
            ->join('datos_robo', 'aseguramientos.datos_robo_id', '=', 'datos_robo.id')
            ->join('fuentes_info', 'datos_robo.fuente_id', '=', 'fuentes_info.id')
            ->join('formas_robo', 'datos_robo.forma_robo_id', '=', 'formas_robo.id')
        ->join('lugares', 'registros.lugar_id', '=', 'lugares.id')
            ->join('estados', 'estados.id', '=', 'lugares.est_id')
            ->join('municipios', 'municipios.mun_id', '=', 'lugares.mun_id')
            ->join('localidades', 'localidades.loc_id', '=', 'lugares.loc_id')
        ->join('recibimientos', 'registros.recibimiento_id', '=', 'recibimientos.id')
            ->join('delitos', 'recibimientos.delito_id', '=', 'delitos.id')
        ->where('localidades.est_id', '=', DB::raw('lugares.est_id'))
        ->where('localidades.mun_id', '=', DB::raw('lugares.mun_id'))
        ->where('localidades.loc_id', '=', DB::raw('lugares.loc_id'))
        ->where('municipios.mun_id', '=', DB::raw('localidades.mun_id'))
        ->where('municipios.est_id', '=', DB::raw('localidades.est_id'))
        ->orderby('registros.id')
        ->get();

        return view('vehiculos', compact('registros'));
    }

    public function contarDatos(){
        $registros = DB::scalar(
            "select count(id) from registros"
        );
        $users = DB::scalar(
            "select count(id) from users"
        );
        return view('resumen', compact('registros', 'users'));

    }

    public function cargar_catalogos(Request $request){
        $clasific = Clasif_vehi::All();
        $marcas = Marca::All();
        $motivos = Motivo::All();
        $autoridades = Autoridad::All();
        $formasrobo = FormaRobo::where('id', '>', 1)->get();
        $fuentesinfo = FuenteInfo::where('id', '>', 1)->get();
        $estados = Estado::All();
        $delitos = Delito::All();
        return view('reg_vehiculo', compact('clasific','marcas', 'motivos', 'autoridades','formasrobo','fuentesinfo', 'estados', 'delitos'));
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

    public function get_fotos($id){
        return json_encode(Foto::select('*')
            ->where('registro_id','=',$id)
            ->get());
    }

    public function registrar(Request $request){
        // Validaciones
        $validator = Validator::make($request->all(), [
            'clasific_id' => 'required',
            'tipo_id' => 'required',
            'marca_id' => 'required',
            'submarca_id' => 'required',
            'anio_mod' => 'required',
            'color' => 'required|max:30',
            's_orig' => ['required','max:20','regex:/^([ABCDEFGHJKLMNPRSTUVWXYZ]|[0-9]){0,20}$/'],
            's_apo' => ['required','max:20','regex:/^([ABCDEFGHJKLMNPRSTUVWXYZ]|[0-9]){0,20}$/'],
            'no_motor' => 'required|max:20',
            'placas' => ['required','max:10','regex:/^[A-Z]|[0-9]{0,10}$/'],
            'or_sob' => 'required',
            'cond_vehi' => 'required|max:300',
            
            'motivo_id' => 'required',
            'autoridad_as_id' => 'required',
            'personas' => 'required|max:300',
            'deposito' => 'required|max:50',
            'fecha' => 'required|date|before_or_equal:' . Carbon::now()->toDateString(),
            
            'fuente_id' => 'required_if:motivo_id,1',
            'lugarrobo' => 'required_if:motivo_id,1',
            'fecharobo' => 'required_if:motivo_id,1',
            'forma_robo_id' => 'required_if:motivo_id,1',

            'est_id' => 'required',
            'municipio' => 'required',
            'localidad' => 'required',
            'calle' => 'required|max:80',
            'numero' => 'required|max:20',
            'colonia' => 'required|max:80',
            
            'aut_rec' => 'required|max:50',
            'titular' => 'required|max:50',
            'cpet1' => 'required|max:8',
            'cpet2' => 'required|max:4',
            'cpet3' => 'required|max:6',
            'delito_id' => 'required|max:80',
        ], [
            // Mensajes de error
            'required' => 'El campo es obligatorio',
            'required_if' => 'El campo es obligatorio',
            'required_unless' => 'El campo es obligatorio',
            'max' => 'Maximo :max caracteres',
            'before_or_equal' => 'Introduzca una fecha valida',
            'date' => 'Introduzca una fecha valida',
            'regex' => 'Informacion no valida',
            'cpet1.required' => 'Obligatorio',
            'cpet2.required' => 'Obligatorio',
            'cpet3.required' => 'Obligatorio',
        ]);

        // Si la validación falla, redirige de nuevo al formulario con los errores
        if ($validator->fails()) {
            // dd($errors = $validator->errors()->all());
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Para mantener los datos anteriores en el formulario
        }

        $vehi = new Vehiculo();
        $aseg = new Aseguramiento();
        $datos_r = new DatosRobo();
        $lugar = new Lugar();
        $recib = new Recibimiento();
        $user = Auth::user();
        $registro = new Registro();

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
            
            $lugar -> est_id = $request -> est_id < 10 ? '0' . $request -> est_id : $request -> est_id;
            $lugar -> mun_id = $request -> municipio;
            $lugar -> loc_id = $request -> localidad;
            $lugar -> calle = $request -> calle;
            $lugar -> numero = $request -> numero;
            $lugar -> colonia = $request -> colonia;
                  
            $recib -> aut_rec = $request -> aut_rec;
            $recib -> titular = $request -> titular;
            $cpet = $request -> cpet1 . '/' . $request -> cpet2 . '-' . $request -> cpet3;
            $recib -> cpet_inv = $cpet;
            $recib -> delito_id = $request -> delito_id;

            $vehi -> save();
            $aseg -> save();
            $lugar -> save();
            $recib -> save();
                       
            $registro -> vehiculo_id = $vehi -> id;
            $registro -> aseguramiento_id = $aseg -> id;
            $registro -> lugar_id = $lugar -> id;
            $registro -> recibimiento_id = $recib -> id;
            $registro -> elemento = $user -> name;
            $registro -> cargo_id = $user -> cargo_id;
            $registro -> unidad_id = $user -> unidad_id;
            $registro -> distrito_id = $user -> distrito_id;
            $registro -> fecha = date('Y-m-d H:i:s');

            $registro -> save();
            
            if($request->hasFile('fotos')){
                foreach ($request->file('fotos') as $foto) {
                    $manager = new ImageManager(Driver::class);
    
                    // reading gif image
                    $image = $manager->read($foto);
    
                    // encoding jpeg data
                    $encoded = $image->encode(new WebpEncoder(quality: 65));
                    $imageName = uniqid().'.webp';
                    $ruta = storage_path() . '/app/public/imagenes' . '/'. $registro->id . '/';
                    if (!file_exists($ruta)) {
                        mkdir($ruta, 0775, true);
                    }
    
                    $encoded->save($ruta . $imageName);
    
                    Foto::create([
                        'nombre' => $imageName,
                        'ruta' => $ruta,
                        'registro_id' => $registro->id,
                    ]);
                }
            }
            
            // dd($request);

            return redirect()->route('vehiculos');//->with('correcto', 'Usuario creado satisfactoriamente');
        } catch (\Illuminate\Database\QueryException $ex) {
            dd($ex);
            // return redirect()->back();
        }
    }
}
