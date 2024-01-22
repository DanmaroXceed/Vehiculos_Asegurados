@extends('home')

@section('contenido')

<div class="p-3" style="min-width: 100%">
    <div class="py-3">
        <a class="btn btn-outline-success" href='/va/registrar'>Registrar nuevo vehiculo asegurado</a>
    </div>

    {{-- <div class="accordion" id="accordion">
        @foreach ($list as $user)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $user->id }}" aria-expanded="true"
                        aria-controls="collapse{{ $user->id }}">
                        {{ $user->id }}: {{ $user->name }}
                    </button>
                </h2>
                <div id="collapse{{ $user->id }}" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Usuario: {{ $user->usuario }} <br>
                        Email: {{ $user->email }}
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
</div>

@endsection