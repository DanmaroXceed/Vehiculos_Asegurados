@extends('home')

@section('contenido')
    <div class="text-white pl-3 contenido">
        <div class="p-3">
            Cantidad de vehiculos Asegurados <br>
            <div style="font-size: 30px">
                {{ $vehiculos }}
            </div>
        </div>
    </div>
    <div class="text-white m-3 contenido">
        <div class="p-3">
            KPI 2
        </div>
    </div>
    <div class="text-white pr-3 contenido">
        <div class="p-3">
            KPI 3
        </div>
    </div>
@endsection
