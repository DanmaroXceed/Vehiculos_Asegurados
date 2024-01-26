@extends('home')

@section('contenido')

<div class="p-3" style="min-width: 100%">
    <div class="py-3">
        <a class="btn btn-outline-success" href='/va/registrar'>Registrar nuevo vehiculo asegurado</a>
    </div>

    <div class="accordion" id="accordion" >
        @foreach ($vehiculos as $vehiculo)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $vehiculo->id }}" aria-expanded="true"
                        aria-controls="collapse{{ $vehiculo->id }}">
                        {{ $vehiculo->id }}: {{ $vehiculo->submarca }}
                    </button>
                </h2>
                <div id="collapse{{ $vehiculo->id }}" class="accordion-collapse collapse text-white" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Clasificacion: {{ $vehiculo->clasificacion }}<br>
                        Tipo: {{ $vehiculo->tipo }} <br>
                        Marca: {{ $vehiculo->marca }} <br>
                        Submarca: {{ $vehiculo->submarca }} <br>
                        Color: {{ $vehiculo->color }} <br>
                        Año del modelo: {{ $vehiculo->anio_mod }} <br>
                        Serie original: {{ $vehiculo->s_orig }} <br>
                        Serie apocrifa: {{ $vehiculo->s_apo }} <br>
                        Numero del motor: {{ $vehiculo->no_motor }} <br>
                        Placas: {{ $vehiculo->placas }} <br>
                        Condiciones del vehiculo: {{ $vehiculo->cond_vehi }} <br>
                        Original / Sobrepuesta: {{ $vehiculo->or_sob }} <br><br>
                        
                        Motivo: {{ $aseguramientos[($vehiculo->id)-1]->motivo }}<br>
                        Autoridad que asegura: {{ $aseguramientos[($vehiculo->id)-1]->autoridad }}<br>
                        Personas aseguradas: {{ $aseguramientos[($vehiculo->id)-1]->personas }}<br>
                        Lugar de deposito: {{ $aseguramientos[($vehiculo->id)-1]->deposito }}<br>
                        Fecha de aseguramiento: {{ $aseguramientos[($vehiculo->id)-1]->fecha }}<br>
                        Forma de robo: {{ $aseguramientos[($vehiculo->id)-1]->formarobo }}<br>
                        Fuente de informacion: {{ $aseguramientos[($vehiculo->id)-1]->fuenteinfo }}<br>
                        Lugar del robo: {{ $aseguramientos[($vehiculo->id)-1]->lugarR }}<br>
                        Fecha del robo: {{ $aseguramientos[($vehiculo->id)-1]->fechaR }}<br>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection