<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <script src="https://kit.fontawesome.com/4a96e8901e.js" crossorigin="anonymous"></script>
  {{--
  <link rel="stylesheet" href="{{asset('css/custom.min.css')}}"> --}}

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      background-image: linear-gradient(#98FFE0, #003817);
      min-height: 100vh;
      padding-top: 70px;
    }
  </style>

</head>

<body>
  {{-- NAVBAR --}}
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home.index')}}">Arrienda</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          @if(Gate::allows('usuarios-gestion'))
          <li class="nav-item">
            <a class="nav-link {{ Route::is('usuarios.index') ? 'active' : '' }}"  href="{{route('usuarios.index')}}">Gestionar Usuarios</a>
          </li>
          @endif

          @if(Gate::allows('servicios-gestion'))
          <li class="nav-item">
            <a class="nav-link {{ Route::is('vehiculos.index') ? 'active' : '' }}"  href="{{route('vehiculos.index')}}">Gestionar Vehiculos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Route::is('tipos.index') ? 'active' : '' }}" aria-current="page" href="{{route('tipos.index')}}">Gestionar Tipos</a>
          </li>

          <li class="nav-item ">
            <a class="nav-link {{ Route::is('clientes.index') ? 'active' : '' }}" aria-current="page" href="{{route('clientes.index')}}">Gestionar Clientes</a>
          </li>

          <li class="nav-item" aria-current="page">
            <a class="nav-link {{ Route::is('') ? 'active' : '' }}" aria-current="page" href="#">Gestionar Arriendos</a>
          </li>
          @endif

        </ul>
      </div>
      <div>
        @auth
        <small>{{ Auth::user()->nombre }} ({{ Auth::user()->usuarioPerfil() }})</small>
        @endauth


        <a href="{{ route('usuarios.logout') }}" class="btn btn-sm btn-success">
          <span class="material-icons fs-6">Cerrar Sesion</span>
        </a>
      </div>

    </div>
  </nav>
  {{-- FIN NAVBAR --}}
  <div class="container-fluid">
    @yield('contenido-principal')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>