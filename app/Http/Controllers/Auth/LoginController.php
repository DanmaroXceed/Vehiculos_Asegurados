<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Unidad;
use App\Models\Distrito;

class LoginController extends Controller
{
    public function index(){
        $cargos = Cargo::where('id', '>', 1)->get();
        $unidades = Unidad::where('id', '>', 1)->get();
        $distritos = Distrito::where('id', '>', 1)->get();

        return view('reg_usuario', compact('cargos','unidades', 'distritos'));
    }


    public function registrar(Request $request){
        //  Validar los datos
        $request -> validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'usuario' => 'required',
            'contra' => 'required',
            'password' => 'required|same:contra',
        ]);
        
        $usuario = new User();
        try {
            $usuario -> name = $request -> nombre;
            $usuario -> usuario = $request -> usuario;
            $usuario -> password = Hash::make($request -> contra);
            $usuario -> email = $request -> correo;
            $usuario -> tipo = 0;
            $usuario -> cargo_id = $request -> cargo_id;
            $usuario -> unidad_id = $request -> unidad_id;
            $usuario -> distrito_id = $request -> distrito_id;

            $usuario -> save();
            return redirect()->route('registrar')->with('correcto', 'Usuario creado satisfactoriamente');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error', 'Prueba con otro correo electronico o nombre de usuario');
        }
    }
    
    public function acceder(Request $request){
        $request -> validate([
            'usuario' => 'required',
            'contra' => 'required'
        ]);

        $credenciales = [
            'usuario' => $request -> usuario,
            'password' => $request -> contra,
        ];

        $recuerda = ($request->has('recuerda') ? true : false);

        if(Auth::attempt($credenciales, $recuerda)){
            $request->session()->regenerate();
            return redirect(route('home'));
        }else{
            return redirect('/');
        }
    }

    public function salir(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
