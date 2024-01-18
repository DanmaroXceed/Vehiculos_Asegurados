@extends('app')

@section('home')
    {{-- navbar --}}
    @include('navbar')
    {{-- Fin navbar --}}

    <div class="divcontenido"
        style="display: flex;
	align-items: center;
	justify-content: center;
	margin: 0;">
        @yield('contenido')
    </div>
@endsection
