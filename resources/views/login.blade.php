@extends('app')

@section('home')
    <div class="row justify-content-center ">
        <H1 class="text-white p-5 row justify-content-center fit-content">Vehiculos Asegurados</H1>
        <div class="text-white m-3"
            style = "width:fit-content;
                    border-radius: 10px; /* Bordes redondos */
                    background: rgb(39, 41, 61);
                    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
                    min-width: 30%;
                    max-width: 80%;">
            <div class="container p-4 my-4">
                <h3 class="pb-3">Iniciar sesion</h3>
                <form action="{{ route('loggear') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input value="" type="text" placeholder="usuario" class="form-control" name="usuario">
                    </div>
                    <div class="mb-3">
                        <input value="" type="password" placeholder="Contraseña" class="form-control" name="contra">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="recuerda">
                        <label class="form-check-label" for="recuerda">Recordarme</label>
                    </div>

                    <button type="submit" class="btn btn-primary ">Acceder</button>

                </form>
            </div>
        </div>
        <footer style="background-color:rgb(33, 37, 41);
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;">
            <div style="max-width: 800px;
                margin: 0 auto;">
                <p class="text-white">&copy; {{ date('Y') }} <a href="https://www.fiscaliazacatecas.gob.mx/">Fiscalía General de Justicia del Estado de Zacatecas</a></p>
                
            </div>
        </footer>
    </div>
@endsection
