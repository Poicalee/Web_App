<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rozkład Jazdy</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    /* Optional styling for navbar and content separation */
    .content {
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">JakDojade</a>
      <a href="{{ route('routes.index') }}" class="nav-link active">Rozkład jazdy</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Zarządzaj zasobami</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Wyloguj się</a>
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

  <div class="container content">
    <h1>Routes</h1>

    @if (count($routes) > 0)
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Start Point</th>
            <th>End Point</th>
            <th>Distance</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($routes as $route)
            <tr>
              <td>{{ $route->start_point }}</td>
              <td>{{ $route->end_point }}</td>
              <td>{{ $route->distance }}</td>
              <td>{{ $route->departure_time->format('H:i:s') }}</td>
              <td>{{ $route->arrival_time->format('H:i:s') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>No routes found. There are currently no routes defined.</p>
    @endif
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
