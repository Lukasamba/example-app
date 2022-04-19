<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        <title>Home</title>
    </head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">IMDB</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/movies">Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/tvseries">TV Series</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/games">Games</a>
            </li>
            @if ((Session()->has('userInfo')))
              @if ((Session()->get('userInfo')['isAdmin']) == "YES"))
              <li class="nav-item">
                <a class="nav-link" href="/userlist">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin">Admin</a>
              </li>
              @endif
            @endif
          </ul>
          <ul class="navbar-nav ms-auto d-flex">
            @if (!Session::has('userInfo'))
                
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>

            @else

            <li class="nav-item">
              <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/logout">Log out</a>
            </li>
            
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
    
</body>
</html>