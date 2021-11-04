<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Better Health</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/dashboard">Better Lifestyle</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/excercises">Excercises</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/excercise-history">Excercise History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/workout-routines">Workout Routines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my-routine">My Routine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ingredients">Ingredients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/foods">Foods</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/diet-types">Diet Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/{{ auth()->user()->id }}">User Data</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <li class="nav-item">
                            <input class="nav-link me-auto" type="submit" value="Log out">
                        </li>
                    </form>
                @endauth
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endguest
            </ul>
          </div>
        </div>
      </nav>
</body>
</html>
