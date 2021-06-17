<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lesquestions</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700|Nunito:300,400,600">
    <link rel="stylesheet" href="">
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="">lesquestions</a></h1>
            <button id="burger" type="button">
                <i class="fas fa-bars"></i>
            </button>
            <nav>
                <ul class="menu">
                    <!-- Pour les guest -->
                    <li><a href="">Inscription</a></li>
                    <li><a href="">Connexion</a></li>
                    <!-- Sinon pour les authentifiés -->
                    <li class="flex"><img src="" alt=""><span><a href="">Name</a></span></li>
                    <li><a href="">Ecrire une question</a></li>
                    <li><a href="" onclick="event.preventDefault(); document.getElementById('logout').submit();">Déconnexion</a></li>
                    <form id="logout" action="" method="POST" style="display: none;">
                        <!-- Champ CSRF -->
                    </form>
                    <!-- Fin pour les guest -->
                </ul>
            </nav>
        </div>
    </header>
    <!-- Contenu des pages -->
    <script src=""></script>
    <script src=""></script>
</body>
</html>
