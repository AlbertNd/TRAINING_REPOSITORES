<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lesquestions</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700|Nunito:300,400,600">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="{{ route('questions.index') }}">lesquestions</a></h1>
            <button id="burger" type="button">
                <i class="fas fa-bars"></i>
            </button>
            <nav>
                <ul class="menu">
                    @guest
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    @else
                    <li class="flex"><img src="{{ Gravatar::src(Auth::user()->email) }}" alt=""><span><a href="{{ route('compte.home') }}">{{ Auth::user()->name }}</a></span></li>
                    <li><a href="{{ route('questions.create') }}">Ecrire une question</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();">Déconnexion</a></li>
                    <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>
    @yield('content')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/lesquestions.js') }}"></script>
</body>
</html>
