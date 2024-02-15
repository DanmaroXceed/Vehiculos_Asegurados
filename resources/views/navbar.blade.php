<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand px-3" href="/home">Vehiculos Asegurados</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mx-3 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/va">Registros</a>
                </li>
                @if ( Auth::user()->tipo == 1 )
                    <li class="nav-item" >
                        <a class="nav-link" href="/us">Usuarios</a>
                    </li>    
                @endif
            </ul>

            <div class="text-center px-5 mb-2">
                <div class="text-white">Ingresad@ como: 
                    <strong>{{ Auth::user()->name}}</strong>
                </div>
            </div>
            
            <form class="p-2" action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Salir</button>
            </form>
        </div>
    </div>
</nav>
