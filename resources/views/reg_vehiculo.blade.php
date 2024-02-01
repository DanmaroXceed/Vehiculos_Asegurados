@extends('home')

@section('contenido')
    <div class="text-white m-3 contenido">
        <div class="container p-4 my-4">
            <h3 class="mb-2 pb-5">Registrar vehiculo</h3>
            <form action="{{ route('guardar-nuevo-VA') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- @error('nameDoc')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('docDesc')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('date')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('place')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
                @error('escDesc')
                    <h6 class="alert alert-danger">{{ $message }}</h6>
                @enderror
        
                @if (session('correcto'))
                    <h6 class="alert alert-success">{{ session('correcto') }}</h6>
                @endif --}}

                <div class="row">
                    <div>
                        <h5>Del vehiculo</h5>
                    </div>
                    <div class="col">

                        <div class="mb-3">
                            <label for="clasif" class="form-label">Clasificacion</label>
                            <select class="form-select" name="clasific_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($clasific as $clas)
                                    <option value="{{ $clas->id }}">{{ $clas->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_id" class="form-label">Tipo</label>
                            <select class="form-select" name="tipo_id">
                                <option selected>Seleccionar opcion</option>
                            </select>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('select[name="clasific_id"]').on('change', function(e) {
                                    var id = $(this).val();
                                    $.ajax({
                                        type: 'GET',
                                        url: '/get-tipo-v/' + id,
                                        success: function success(data) {
                                            // Quitar todas las opciones del select
                                            $('select[name="tipo_id"]').children('option').remove();

                                            // Preparar los datos para añadir cada opción nueva al select
                                            var options = JSON.parse(data);
                                            for (let i = 0; i < options.length; i++) {
                                                $('select[name="tipo_id"]').append('<option value="' + options[i]['id'] + '">' +
                                                    options[i]['descripcion'] + '</option>');
                                            }
                                        },
                                        error: function error(data) {
                                            console.log("Error", data);
                                        }
                                    });
                                });
                            </script>
                        </div>

                        <div class="mb-3">
                            <label for="marca_id" class="form-label">Marca</label>
                            <select class="form-select" name="marca_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="submarca_id" class="form-label">Submarca</label>
                            <select class="form-select" name="submarca_id">
                                <option selected>Seleccionar opcion</option>
                            </select>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('select[name="marca_id"]').on('change', function(e) {
                                    var id = $(this).val();
                                    $.ajax({
                                        type: 'GET',
                                        url: '/get-submarca-v/' + id,
                                        success: function success(data) {
                                            // Quitar todas las opciones del select
                                            $('select[name="submarca_id"]').children('option').remove();

                                            // Preparar los datos para añadir cada opción nueva al select
                                            var options = JSON.parse(data);
                                            for (let i = 0; i < options.length; i++) {
                                                $('select[name="submarca_id"]').append('<option value="' + options[i]['id'] +
                                                    '">' +
                                                    options[i]['descripcion'] + '</option>');
                                            }
                                        },
                                        error: function error(data) {
                                            console.log("Error", data);
                                        }
                                    });
                                });
                            </script>
                        </div>
                        
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año del modelo</label>
                            <select class="form-select" name="anio_mod">
                                <option selected>Seleccionar opcion</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = 1900;
                                @endphp

                                @for ($year = $currentYear + 1; $year > $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <input value="" type="text" class="form-control" name="color">
                        </div>
                    
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="s_orig" class="form-label">Serie original</label>
                            <input value="" type="text" class="form-control" name="s_orig">
                        </div>

                        <div class="mb-3">
                            <label for="s_apo" class="form-label">Serie apocrifa</label>
                            <input value="" type="text" class="form-control" name="s_apo">
                        </div>

                        <div class="mb-3">
                            <label for="no_motor" class="form-label">Numero del motor</label>
                            <input value="" type="text" class="form-control" name="no_motor">
                        </div>

                        <div class="mb-3">
                            <label for="placas" class="form-label">Placas</label>
                            <input value="" type="text" class="form-control" name="placas">
                        </div>
                        
                        <div class="mb-3">
                            <label for="orSob" class="form-label">Original/Sobrepuestas</label>
                            <select class="form-select" name="or_sob">
                                <option selected>Seleccionar opcion</option>
                                <option value="Original">Original</option>
                                <option value="Sobrepuestas">Sobrepuestas</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="cond_vehi" class="form-label">Condiciones del vehiculo</label>
                            <input value="" type="text" class="form-control" name="cond_vehi">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div>
                            <h5>Aseguramiento</h5>
                        </div>
                        <div class="mb-3">
                            <label for="motivo_id" class="form-label">Motivo</label>
                            <select class="form-select" name="motivo_id" id="motivo_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($motivos as $motivo)
                                    <option value="{{ $motivo->id }}">{{ $motivo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="autoridad_as_id" class="form-label">Autoridad que asegura</label>
                            <select class="form-select" name="autoridad_as_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($autoridades as $autoridad)
                                    <option value="{{ $autoridad->id }}">{{ $autoridad->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="personas" class="form-label">Persona(s) a quien se asegura</label>
                            <input value="" type="text" class="form-control" name="personas">
                        </div>
                        <div class="mb-3">
                            <label for="deposito" class="form-label">Local o lugar de deposito</label>
                            <input value="" type="text" class="form-control" name="deposito">
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de aseguramiento</label>
                            <input value="" type="date" class="form-control" name="fecha">
                        </div>
                        
                        <div id="datos_robo" class="mb-3" style="display:none;">
                            <h5>Datos del robo</h5>
                            <label for="fuente_id" class="form-label">Fuente de informacion</label>
                            <select class="form-select" name="fuente_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($fuentesinfo as $fuente)
                                    <option value="{{ $fuente->id }}">{{ $fuente->descripcion }}</option>
                                @endforeach
                            </select>

                            <label for="lugarrobo" class="form-label">Lugar</label>
                            <input value="" type="text" class="form-control" name="lugarrobo">

                            <label for="fecharobo" class="form-label">Fecha</label>
                            <input value="" type="date" class="form-control" name="fecharobo">

                            <label for="forma_robo_id" class="form-label">Forma de robo</label>
                            <select class="form-select" name="forma_robo_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($formasrobo as $forma)
                                    <option value="{{ $forma->id }}">{{ $forma->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#motivo_id').on('change', function() {
                                    var selectedValue = $(this).val();
                                    if (selectedValue == 1) {
                                        $('#datos_robo').show();
                                    } else {
                                        $('#datos_robo').hide();
                                    }
                                });
                            });
                        </script>

                    </div>

                    <div class="col">
                        <div>
                            <h5>Del lugar</h5>
                        </div>
                        <div class="mb-3">
                            <label for="est_id" class="form-label">Estado</label>
                            <select class="form-select" name="est_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="municipio" class="form-label">Municipio</label>
                            <select class="form-select" name="municipio">
                                <option selected>Seleccionar opcion</option>
                            </select>

                            <script>
                                $('select[name="est_id"]').on('change', function(e) {
                                    var id = $(this).val();
                                    $.ajax({
                                        type: 'GET',
                                        url: '/get-municipios/' + id,
                                        success: function success(data) {
                                            // Quitar todas las opciones del select
                                            $('select[name="municipio"]').children('option').remove();

                                            // Preparar los datos para añadir cada opción nueva al select
                                            var options = JSON.parse(data);
                                            for (let i = 0; i < options.length; i++) {
                                                $('select[name="municipio"]').append('<option value="' + options[i]['mun_id'] +
                                                    '" id="' + options[i]['est_id'] + '">' + options[i]['descripcion'] + '</option>');
                                            }
                                        },
                                        error: function error(data) {
                                            console.log("Error", data);
                                        }
                                    });
                                });
                            </script>
                        </div>

                        <div class="mb-3">
                            <label for="localidad" class="form-label">Localidad</label>
                            <select class="form-select" name="localidad">
                                <option selected>Seleccionar opcion</option>
                            </select>

                            <script>
                                $('select[name="municipio"]').on('change', function(e) {
                                    var mun = $(this).val();
                                    var est = $('option:selected', this).attr('id');
                                    console.log("Estado: ", est, ' Municipio: ', mun);
                                    $.ajax({
                                        type: 'GET',
                                        url: '/get-localidades/' + mun + '/' + est,
                                        success: function success(data) {
                                            // Quitar todas las opciones del select
                                            $('select[name="localidad"]').children('option').remove();

                                            // Preparar los datos para añadir cada opción nueva al select
                                            var options = JSON.parse(data);
                                            for (let i = 0; i < options.length; i++) {
                                                $('select[name="localidad"]').append('<option value="' + options[i]['loc_id'] +
                                                    '">' + options[i]['descripcion'] + '</option>');
                                            }
                                        },
                                        error: function error(data) {
                                            console.log("Error", data);
                                        }
                                    });
                                });
                            </script>
                        </div>

                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" name="calle">
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Numero</label>
                            <input type="text" class="form-control" name="numero">
                        </div>
                        <div class="mb-3">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input type="text" class="form-control" name="colonia">
                        </div>
                    </div>
                    
                    <div class="col">
                        <div>
                            <h5>Recibimiento</h5>
                        </div>
                        <div class="mb-3">
                            <label for="aut_rec" class="form-label">Autoridad que recibe</label>
                            <input value="" type="text" class="form-control" name="aut_rec">
                        </div>
                        <div class="mb-3">
                            <label for="titular" class="form-label">Nombre del titular</label>
                            <input value="" type="text" class="form-control" name="titular">
                        </div>
                        <label for="" class="form-label">Carpeta de investigacion</label>
                        <div class="mb-3 d-flex">
                            <input style="margin:5px" type="text" class="form-control" name="cpet1">
                            <strong class="my-3">/</strong>
                            <input style="margin:5px" type="text" class="form-control" name="cpet2">
                            <strong class="my-3">-</strong>
                            <input style="margin:5px" type="text" class="form-control" name="cpet3">
                        </div>
                        <div class="mb-3">
                            <label for="delito_id" class="form-label">Delito que se investiga</label>
                            <select class="form-select" name="delito_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($delitos as $delito)
                                    <option value="{{ $delito->id }}">{{ $delito->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row text-white align-items-center">
                    <div class="col">
                        <div class="mb-3">
                            <label for="fotos[]" class="form-label">Cargar fotografias</label>
                            <input class="form-control" type="file" name="fotos[]" accept=".jpeg, .png, .jpg" multiple>
                          </div>                          
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
