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
                        aria-controls="collapse{{ $registro->id }}" name="boton{{ $registro->id }}">
                        {{ $registro->id }}: {{ $registro->submarca }}
                    </button>
                </h2>
                <div id="collapse{{ $registro->id }}" class="accordion-collapse collapse text-white" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <div class="contacor">
                            <h3>Vehiculo</h3>
                            <strong>Clasificacion:</strong> {{ $registro->clasificacion }}<br>
                            <strong>Tipo:</strong> {{ $registro->tipo }} <br>
                            <strong>Marca:</strong> {{ $registro->marca }} <br>
                            <strong>Submarca:</strong> {{ $registro->submarca }} <br>
                            <strong>Color:</strong> {{ $registro->color }} <br>
                            <strong>Año del modelo:</strong> {{ $registro->anio_mod }} <br>
                            <strong>Serie original:</strong> {{ $registro->s_orig }} <br>
                            <strong>Serie apocrifa:</strong> {{ $registro->s_apo }} <br>
                            <strong>Numero del motor:</strong> {{ $registro->no_motor }} <br>
                            <strong>Placas:</strong> {{ $registro->placas }} <br>
                            <strong>Condiciones del registro:</strong> {{ $registro->cond_vehi }} <br>
                            <strong>Original / Sobrepuesta:</strong> {{ $registro->or_sob }} <br><br>
                        </div>
                        
                        <div class="contacor">
                            <h3>Aseguramiento</h3>
                            <strong>Motivo:</strong> {{ $registro->motivo }}<br>
                            <strong>Autoridad que asegura:</strong> {{ $registro->autoridad }}<br>
                            <strong>Personas aseguradas:</strong> {{ $registro->personas }}<br>
                            <strong>Lugar de deposito:</strong> {{ $registro->deposito }}<br>
                            <strong>Fecha de aseguramiento:</strong> {{ $registro->fecha_as }}<br>
                            <strong>Forma de robo:</strong> {{ $registro->formarobo }}<br>
                            <strong>Fuente de informacion:</strong> {{ $registro->fuenteinfo }}<br>
                            <strong>Lugar del robo:</strong> {{ $registro->lugarR }}<br>
                            <strong>Fecha del robo:</strong> {{ $registro->fechaR }}<br><br>
                        </div>

                        <div class="contacor">
                            <h3>Lugar</h3>
                            <strong>Estado:</strong> {{ $registro->est }}<br>
                            <strong>Municipio:</strong> {{ $registro->mun }}<br>
                            <strong>Localidad:</strong> {{ $registro->loc }}<br>
                            <strong>Calle:</strong> {{ $registro->calle }}<br>
                            <strong>Numero:</strong> {{ $registro->numero }}<br>
                            <strong>Colonia:</strong> {{ $registro->colonia }}<br><br>                            
                        </div>

                        <div class="contacor">
                            <h3>Recibimiento</h3>
                            <strong>Autoridad que recibe:</strong> {{ $registro->aut_rec }}<br>
                            <strong>Titular:</strong> {{ $registro->titular }}<br>
                            <strong>Carpeta de investigacion:</strong> {{ $registro->cpet_inv }}<br>
                            <strong>Delito que se investiga:</strong> {{ $registro->delito }}<br><br>
                        </div>

                        <div class="contacor">
                            <h3>Registro</h3>
                            <strong>Elemento:</strong> {{ $registro->elemento }}<br>
                            <strong>Cargo:</strong> {{ $registro->cargo}}<br>
                            <strong>Unidad:</strong> {{ $registro->unidad }}<br>
                            <strong>Distrito:</strong> {{ $registro->distrito }}<br>
                            <strong>Recha del registro:</strong> {{ $registro->fecha_reg }}<br>
                        </div>
                        
                        <div class="my-3 fotos" name="fotos">
                            <h3>Fotografias</h3>
                            {{-- <img src="{{ asset('storage/imagenes/1/65bd3eb1d3e73.webp')}}"> --}}
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            id = {{ $registro->id }};
                            $('button[name="boton'+id+'"]').on('click', function(e) {
                                $.ajax({
                                    type: 'GET',
                                    url: '/get-fotos/' + id,
                                    success: function success(data) {
                                        $('div[name="fotos"]').children('div').remove();

                                        var foto = JSON.parse(data);
                                        
                                        console.log(foto);
                                        for (let i = 0; i < foto.length; i++) {
                                            $('div[name="fotos"]').append('<img src="' + "{{ asset('storage/imagenes/') }}" + '/' + foto[i]['registro_id'] + '/' + foto[i]['nombre'] + '" class="foto">');
                                            console.log('<img src="' + "{{ asset('storage/imagenes/') }}" + '/' + foto[i]['registro_id'] + '/' + foto[i]['nombre'] + '">');
                                        }
                                    },
                                    error: function error(data) {
                                        console.log("Error", data);
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection