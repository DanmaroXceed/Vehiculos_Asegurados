@extends('home')

@section('contenido')
    <div class="text-white m-3 contenido">
        <div class="container p-4 my-4">
            <h3 class="mb-2 pb-5">Registrar vehiculo</h3>
            <form action="" method="POST">
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
                    <div class="col">
                        <div>
                            <h5>Del vehiculo</h5>
                        </div>

                        <div class="mb-3">
                            <label for="clasif" class="form-label">Clasificacion</label>
                            <select class="form-select" aria-label="Default select example" name="clasific_id">
                                <option selected>Seleccionar opcion</option>
                                @foreach ($clasific as $clas)
                                    <option value="{{ $clas->id }}">{{ $clas->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_id" class="form-label">Tipo</label>
                            <select class="form-select" aria-label="Default select example" name="tipo_id">
                                <option selected>Seleccionar opcion</option>
                            </select>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('select[name="clasific_id"]').on('change', function(e) {
                                    var brand = $(this).val();
                                    $.ajax({
                                        type: 'GET',
                                        url: '/get-tipo-v/' + brand,
                                        success: function success(data) {
                                            // Quitar todas las opciones del select
                                            $('select[name="tipo_id"]').children('option').remove();

                                            // Preparar los datos para añadir cada opción nueva al select
                                            var options = JSON.parse(data);
                                            for (let i = 0; i < options.length; i++) {
                                                $('select[name="tipo_id"]').append('<option value="' + options[i]['id'] +
                                                    '" selected="selected">' + options[i]['descripcion'] + '</option>');
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
                            <label for="submarca" class="form-label">Marca</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar opcion</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Submarca</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar opcion</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label">Color</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar opcion</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año del modelo</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar opcion</option>
                                <option value="1">One</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="serieO" class="form-label">Serie original</label>
                            <input value="" type="text" class="form-control" name="serieO">
                        </div>
                        <div class="mb-3">
                            <label for="serieA" class="form-label">Serie apocrifa</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="numMotor" class="form-label">Numero del motor</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="placas" class="form-label">Placas</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="orSob" class="form-label">Original/Sobrepuestas</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Seleccionar opcion</option>
                                <option value="1">Original</option>
                                <option value="2">Sobrepuestas</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h5>Del lugar</h5>
                        </div>
                        <div class="mb-3">
                            <label for="lugAseg" class="form-label">Lugar de aseguramiento</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Calle</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Numero</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Colonia</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Comunidad</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Municipio</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Estado</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h5>Motivo</h5>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Motivo de aseguramiento</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Fecha de aseguramiento</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Local o lugar de deposito</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Autoridad que asegura</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Persona(s) a quien se asegura</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h5>Autoridad</h5>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Autoridad que recibe</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre del titular</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">C.U.I</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Delito que se investiga</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <h5>Captura</h5>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Elemento que captura</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cargo</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Unidad o distrito de adscripcion</label>
                            <input value="" type="text" class="form-control" name="serieA">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
