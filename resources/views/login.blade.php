@extends('app')

@section('home')
    <section class="h-100 gradient-form pb-4 m-2" style="background-color: rgb(33, 37, 41)">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ asset('FiscaliaLogo.jpeg') }}" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Vehiculos asegurados</h4>
                                    </div>

                                    <form action="{{ route('loggear') }}" method="POST">
                                        @csrf

                                        @if (session('error'))
                                            <h6 class="alert alert-danger">{{ session('error') }}</h6>
                                        @endif

                                        <p>Por favor, ingresa tus credenciales:</p>

                                        <div class="form-outline mb-4">
                                            @error('usuario')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                            <input type="text" value="{{ old('usuario') }}" name="usuario" class="form-control"/>
                                            <label class="form-label" for="usuario">Nombre de usuario</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            @error('contra')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                            <input type="password" name="contra" class="form-control" />
                                            <label class="form-label" for="contra">Contraseña</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">
                                                Iniciar sesion
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Este sitio web esta destinado para:</h4>
                                    <p class="small mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p class="text-white justify-content-center">&copy; {{ date('Y') }} <a href="https://www.fiscaliazacatecas.gob.mx/">Fiscalía General de Justicia del Estado de Zacatecas</a></p>    
    </footer>
@endsection
