@extends('app')

@section('home')
    <div class="row justify-content-center ">
        <H1 class="text-white p-5 row justify-content-center fit-content">Vehiculos Asegurados</H1>
        <div class="text-white m-3 contenido">
            <div class="container p-4 my-4">
                <h3 class="pb-3">Iniciar sesion</h3>
                <form action="{{ route('loggear') }}" method="POST">
                    @csrf
                    @if (session('error'))
                        <h6 class="alert alert-danger">{{ session('error') }}</h6>
                    @endif
                    <div class="mb-3">
                        <input value="{{ old('usuario') }}" type="text" placeholder="Usuario" class="form-control" name="usuario">
                            @error('usuario')
                                <div class="error">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <input value="" type="password" placeholder="Contraseña" class="form-control" name="contra">
                            @error('contra')
                                <div class="error">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="mb-3 form-check d-flex text-left">
                        <input type="checkbox" class="form-check-input" name="recuerda">
                        <label class="form-check-label mx-2" for="recuerda">Recordarme</label>
                    </div>

                    <button type="submit" class="btn btn-primary ">Acceder</button>

                </form>
            </div>
        </div>
        <footer>
            <p class="text-white">&copy; {{ date('Y') }} <a href="https://www.fiscaliazacatecas.gob.mx/">Fiscalía General de Justicia del Estado de Zacatecas</a></p>    
        </footer>
    </div>
@endsection
