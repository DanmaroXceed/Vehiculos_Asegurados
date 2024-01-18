@extends('home')

@section('contenido')
    <div class="text-white m-3 contenido"
        style = "width:fit-content;
                border-radius: 10px; /* Bordes redondos */
                background: rgb(39, 41, 61);
                z-index: 900;
                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
                text-align: center;
                min-width: 30%;">
        
        <div class="container p-4 my-4">
            <h3 class="mb-1 pb-3">Registrar usuario</h3>
            <form action="{{ route('guardar-nuevo-usuario') }}" method="POST">
                @csrf

                @if(session('correcto'))
                    <h6 class="alert alert-success m-3">{{ session('correcto') }}</h6>
                @endif
                @if(session('error'))
                    <h6 class="alert alert-danger m-3">{{ session('error') }}</h6>
                @endif

                @error('nombre')
                    <h6 class="alert alert-danger">Nombre requerido</h6>
                @enderror
                @error('usuario')
                    <h6 class="alert alert-danger">Usuario requerido</h6>
                @enderror
                @error('correo')
                    <h6 class="alert alert-danger">Introduce un correo valido</h6>
                @enderror
                @error('contra')
                    <h6 class="alert alert-danger">Las contraseñas deben ser iguales</h6>
                @enderror
                @error('password')
                    <h6 class="alert alert-danger">Las contraseñas deben ser iguales</h6>
                @enderror

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input value="{{ old('nombre') }}" type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input value="{{ old('usuario') }}" type="text" class="form-control" name="usuario">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input value="{{ old('correo') }}" type="email" class="form-control" name="correo">
                </div>
                <div class="mb-3">
                    <label for="contra" class="form-label">Contraseña</label>
                    <input value="" type="password" class="form-control" name="contra">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Repetir contraseña</label>
                    <input value="" type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>
@endsection