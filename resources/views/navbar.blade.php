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
                    <a class="nav-link" aria-current="page" href="/va">Lista de registros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/us">Usuarios</a>
                </li>
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            <form class="d-flex" action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Salir</button>
            </form>
        </div>
    </div>
</nav>

{{-- Sidebar --}}
{{-- <div class="sidebar mx-3 my-3 text-white" 
    style = "border-radius: 10px; /* Bordes redondos */
            background: rgb(53,7,77);
            background: linear-gradient(180deg, rgba(53,7,77,1) 0%, rgba(20,19,82,1) 100%);  
            z-index: 900;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            width:10%;
            height:100%;
            text-align: center">
	<ul class="p-4" style="list-style-type: none;">
		<li class="m-2">
			<a>Menu admin</a>
		</li>

        <li class="">
            <hr style="border: 1px solid white;
                        width: 100%">
        </li>

        
		<li class="m-2">
            <i class="bi bi-1-circle-fill"></i>
			<a class="nav-link" href="#">Dashboard</a>
		</li>
        <li class="m-2">
			<a class="nav-link" href="#">Vehiculos</a>
		</li>
        <li class="m-2">
			<a class="nav-link" href="#">Usuarios</a>
		</li>
	</ul>
</div> --}}