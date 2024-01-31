@extends('home')

@section('contenido')

<div class="p-3" style="min-width: 100%">
    <div class="py-3">
        <a class="btn btn-outline-success" href='/va/registrar'>Registrar nuevo vehiculo asegurado</a>
    </div>

    <div class="accordion" id="accordion" >
        @foreach ($registros as $registro)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $registro->id }}" aria-expanded="true"
                        aria-controls="collapse{{ $registro->id }}">
                        {{ $registro->id }}: {{ $registro->submarca }}
                    </button>
                </h2>
                <div id="collapse{{ $registro->id }}" class="accordion-collapse collapse text-white" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Clasificacion: {{ $registro->clasificacion }}<br>
                        Tipo: {{ $registro->tipo }} <br>
                        Marca: {{ $registro->marca }} <br>
                        Submarca: {{ $registro->submarca }} <br>
                        Color: {{ $registro->color }} <br>
                        Año del modelo: {{ $registro->anio_mod }} <br>
                        Serie original: {{ $registro->s_orig }} <br>
                        Serie apocrifa: {{ $registro->s_apo }} <br>
                        Numero del motor: {{ $registro->no_motor }} <br>
                        Placas: {{ $registro->placas }} <br>
                        Condiciones del registro: {{ $registro->cond_vehi }} <br>
                        Original / Sobrepuesta: {{ $registro->or_sob }} <br><br>
                        
                        Motivo: {{ $registro->motivo }}<br>
                        Autoridad que asegura: {{ $registro->autoridad }}<br>
                        Personas aseguradas: {{ $registro->personas }}<br>
                        Lugar de deposito: {{ $registro->deposito }}<br>
                        Fecha de aseguramiento: {{ $registro->fecha_as }}<br>
                        Forma de robo: {{ $registro->formarobo }}<br>
                        Fuente de informacion: {{ $registro->fuenteinfo }}<br>
                        Lugar del robo: {{ $registro->lugarR }}<br>
                        Fecha del robo: {{ $registro->fechaR }}<br><br>

                        Estado: {{ $registro->est }}<br>
                        Municipio: {{ $registro->mun }}<br>
                        Localidad: {{ $registro->loc }}<br>
                        Calle: {{ $registro->calle }}<br>
                        Numero: {{ $registro->numero }}<br>
                        Colonia: {{ $registro->colonia }}<br><br>

                        Autoridad que recibe: {{ $registro->aut_rec }}<br>
                        Titular: {{ $registro->titular }}<br>
                        Carpeta de investigacion: {{ $registro->cpet_inv }}<br>
                        Delito que se investiga: {{ $registro->delito }}<br><br>

                        Elemento: {{ $registro->elemento }}<br>
                        Cargo: {{ $registro->cargo}}<br>
                        Unidad: {{ $registro->unidad }}<br>
                        Distrito: {{ $registro->distrito }}<br>
                        Recha del registro: {{ $registro->fecha_reg }}<br>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection