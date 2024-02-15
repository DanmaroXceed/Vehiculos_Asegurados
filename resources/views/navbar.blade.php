<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index: 1000">
    <div class="container-fluid">
        <a class="navbar-brand px-3" href="/home">Vehiculos Asegurados</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/va">Registros</a>
                </li>
                @if ( Auth::user()->tipo == 1 )
                    <li class="nav-item" >
                        <a class="nav-link" href="/us">Usuarios</a>
                    </li>    
                @endif
            </ul>
            <form class="d-flex" action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Salir</button>
            </form>
        </div>
    </div><br>
</nav>
<div class="row text-center">
    <div class="text-white col">Ingresad@ como: 
        <strong>{{ Auth::user()->name}}</strong>
    </div>
</div>