@extends('home')

@section('contenido')
    <div class="p-3" style="min-width: 100%">
        <div class="py-3">
            <a class="btn btn-outline-success" href='/us/registrar'>Agregar usuario</a>
        </div>

        <div class="accordion" id="accordion" >
            @foreach ($list as $user)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $user->id }}" aria-expanded="true"
                            aria-controls="collapse{{ $user->id }}">
                            {{ $user->id }}: {{ $user->name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $user->id }}" class="accordion-collapse collapse text-white" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            Usuario: {{ $user->usuario }} <br>
                            Email: {{ $user->email }} <br>
                            Cargo: {{ $user->cdesc }} <br>
                            Unidad: {{ $user->udesc }} <br>
                            Distrito: {{ $user->ddesc }} <br>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
