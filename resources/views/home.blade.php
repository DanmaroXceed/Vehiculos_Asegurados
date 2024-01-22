@extends('app')

@section('home')
    {{-- navbar --}}
    @include('navbar')
    {{-- Fin navbar --}}

    <div class="divcontenido">
        @yield('contenido')
    </div>
@endsection
