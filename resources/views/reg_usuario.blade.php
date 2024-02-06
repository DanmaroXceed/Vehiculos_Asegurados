@extends('home')

@section('contenido')
    <div class="text-white m-3 contenido">
        <div class="container p-4 my-4">
            <h3 class="mb-1 pb-3">Registrar usuario</h3>
            <form action="{{ route('guardar-nuevo-usuario') }}" method="POST">
                @csrf

                @if (session('correcto'))
                    <h6 class="alert alert-success m-3">{{ session('correcto') }}</h6>
                @endif
                
                {{-- Input formulario --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input value="{{ old('nombre') }}" type="text" class="form-control" name="nombre">
                        {{-- Mensaje de error --}}
                        @error('nombre')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>
                {{-- Fin Input --}}
                
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input value="{{ old('usuario') }}" type="text" class="form-control" name="usuario">
                        @error('usuario')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electronico</label>
                    <input value="{{ old('correo') }}" type="email" class="form-control" name="correo">
                        @error('correo')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="contra" class="form-label">Contraseña</label>
                    <input value="" type="password" class="form-control" name="contra">
                        @error('contra')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirmar contraseña</label>
                    <input value="" type="password" class="form-control" name="password">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="clasif" class="form-label">Cargo</label>
                    <select class="form-select" aria-label="Default select example" name="cargo_id">
                        <option value="" selected>Seleccionar opcion</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                        @endforeach
                    </select>
                        @error('cargo_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="clasif" class="form-label">Unidad</label>
                    <select class="form-select" aria-label="Default select example" name="unidad_id">
                        <option value="" selected>Seleccionar opcion</option>
                        @foreach ($unidades as $unidad)
                            <option value="{{ $unidad->id }}">{{ $unidad->descripcion }}</option>
                        @endforeach
                    </select>
                        @error('unidad_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="clasif" class="form-label">Distrito</label>
                    <select class="form-select" aria-label="Default select example" name="distrito_id">
                        <option value="" selected>Seleccionar opcion</option>
                        @foreach ($distritos as $distrito)
                            <option value="{{ $distrito->id }}">{{ $distrito->descripcion }}</option>
                        @endforeach
                    </select>
                        @error('distrito_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>
@endsection
