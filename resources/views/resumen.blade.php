@extends('home')

@section('contenido')
    <div class="row my-5 mx-2">
        <div class="text-white KPI col">
            <div class="p-3">
                Cantidad de Vehiculos Asegurados <br>
                <div style="font-size: 30px">
                    {{ $registros }}
                </div>
            </div>
        </div>
        <div class="text-white KPI col">
            <div class="p-3">
                Cantidad de Usuarios <br>
                <div style="font-size: 30px">
                    {{ $users }}
                </div>
            </div>
        </div>
        <div class="text-white KPI col">
            <div class="p-3">
                [ KPI ]
            </div>
        </div>
    </div>
@endsection
