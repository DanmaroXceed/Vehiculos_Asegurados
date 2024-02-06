<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Unidad;
use App\Models\Distrito;

class LoginController extends Controller
{
    // Cargar catalogos y mostrar el registro de usuario
    public function index(){
        $cargos = Cargo::where('id', '>', 1)->get();
        $unidades = Unidad::where('id', '>', 1)->get();
        $distritos = Distrito::where('id', '>', 1)->get();

        return view('reg_usuario', compact('cargos','unidades', 'distritos'));
    }

    // Validar campos y guardar usuario
    public function registrar(Request $request){       
        // Validación de los campos del formulario
        $validator = Validator::make($request->all(), [
            // Regex: texto con espacios unicamente
            'nombre' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:50'],
            'correo' => 'required|email|unique:users,email',
            'usuario' => 'required|unique:users|max:20',
            'contra' => 'required|min:8',
            'password' => 'required|same:contra',
            'cargo_id' => 'required|not_in:""',
            'unidad_id' => 'required|not_in:""',
            'distrito_id' => 'required|not_in:""',
        ], [
            // Mensajes de error
            'nombre.required' => 'El campo :attribute es obligatorio.',
            'nombre.regex' => 'El campo :attribute debe de ser texto.',
            'nombre.max' => 'El campo :attribute debe de ser maximo de 50 caracteres.',

            'usuario.required' => 'El campo :attribute es obligatorio.',
            'usuario.unique' => 'Nombre de usuario en uso',
            'usuario.max' => 'El campo :attribute debe de ser maximo de 20 caracteres.',

            'correo.required' => 'El campo :attribute es obligatorio.',
            'correo.email' => 'Introduzca un correo electronico valido',
            'correo.unique' => 'Correo electronico en uso',

            'contra.required' => 'El campo :attribute es obligatorio.',
            'contra.min' => 'La contraseña debe ser de al menos 8 caracteres',

            'password.required' => 'El campo :attribute es obligatorio',
            'password.same' => 'La confirmación de la contraseña no coincide con la contraseña ingresada.',

            'cargo_id.required' => 'El campo :attribute es obligatorio.',
            'unidad_id.required' => 'El campo :attribute es obligatorio.',
            'distrito_id.required' => 'El campo :attribute es obligatorio.',
        ]);

        // Personalizar nombres de atributo
        $validator->setAttributeNames([
            'nombre' => 'Nombre',
            'usuario' => 'Usuario',
            'correo' => 'Correo electrónico',
            'contra' => 'Contraseña',
            'password' => 'Confirmar Contraseña',
            'cargo_id' => 'Cargo',
            'unidad_id' => 'Unidad',
            'distrito_id' => 'Distrito',
        ]);

        // Si la validación falla, redirige de nuevo al formulario con los errores
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Para mantener los datos anteriores en el formulario
        }
        
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
            return redirect()->route('registrar')->with('correcto', 'Usuario guardado satisfactoriamente');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error', 'Prueba con otro correo electronico o nombre de usuario');
        }
    }
    
    // Validacion login y acceso
    public function acceder(Request $request){
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|max:20',
            'contra' => 'required|min:8'
        ],[ //  Mensajes de errores obligatorio
            'usuario.required' => 'El campo :attribute es obligatorio.',
            'usuario.max' => 'No puede ser mayor a 20 caracteres.',
            
            'contra.required' => 'El campo :attribute es obligatorio.',
            'contra.min' => 'No puede ser menor a 8 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Para mantener los datos anteriores en el formulario
        }

        $credenciales = [
            'usuario' => $request -> usuario,
            'password' => $request -> contra,
        ];

        $recuerda = ($request->has('recuerda') ? true : false);

        if(Auth::attempt($credenciales, $recuerda)){
            $request->session()->regenerate();
            return redirect(route('home'));
        }else{
            return back()->with('error', 'Credenciales erroneas, intente de nuevo');
        }
    }

    // Logout
    public function salir(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
