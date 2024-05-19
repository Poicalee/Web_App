<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JakDojade - Aplikacja do zarządzania zasobami</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">JakDojade</a>
      <a href="{{ route('routes.index') }}" class="nav-link">Rozkład jazdy</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Zarządzaj zasobami</a>
            </li>
            <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Zarejestruj się</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2>Wyszukaj połączenia</h2>

    <form action="{{ route('search.routes') }}" method="GET">
      <div class="row mb-3">
        <label for="searchQuery" class="col-sm-2 col-form-label">Wyszukaj połączenia</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Wpisz nazwę połączenia, przystanek lub trasę">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Szukaj</button>
    </form>

    @isset($routes)
      @if (count($routes) > 0)
        <h2>Wyniki wyszukiwania</h2>
        <ul>
          @foreach ($routes as $route)
            <li>
              {{ $route->name }} - {{ $route->start_point }} -> {{ $route->end_point }}
            </li>
          @endforeach
        </ul>
      @else
        <p>Brak wyników wyszukiwania.</p>
      @endif
    @endisset

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-qWLkMkIVxyLj7dcbrrZyLfNHUve2GpP5J6ZGJjF3Jt93MxImE+IBj68rCzBYNE0d" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QC2vVXcYnuE1T/AOwegeHYNw5jrkYM6clSOYqCJJL1bWNexQon9aAvO2G4J9nKGP" crossorigin="anonymous"></script>
</body>
</html>
