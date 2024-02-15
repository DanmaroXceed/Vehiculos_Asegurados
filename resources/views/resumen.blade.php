@extends('home')

@section('contenido')
    <div class="row mt-5 mx-3">
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
