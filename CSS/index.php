<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header class="head-box">
        <nav class="navbar">
            <div class="nav-content">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="" class="nav-link"> Secteur d'activité</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"> Actualité transport</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"> Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link"> Vous etes chauffeur</a>
                    </li>
                </ul>
            </div>
            <div class="hamburger">
                <span class="ham-bar">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </span>
            </div>
        </nav>
        <div class="respo-nav-content">
            <ul class="respo-nav-menu">
                <li class="respo-nav-item">
                    <a href="" class="respo-nav-link"> Secteur d'activité</a>
                </li>
                <li class="respo-nav-item">
                    <a href="" class="respo-nav-link"> Actualité transport</a>
                </li>
                <li class="respo-nav-item">
                    <a href="" class="respo-nav-link"> Se connecter</a>
                </li>
                <li class="respo-nav-item">
                    <a href="" class="respo-nav-link"> Vous etes chauffeur</a>
                </li>
                <li class="respo-nav-item">
                    <a href="" class="respo-nav-link"> Vous etes chauffeur</a>
                </li>
                <li class="respo-nav-item">
                    <a href="" class="respo-nav-link"> Vous etes chauffeur</a>
                </li>
            </ul>
        </div>
        <div class="box-nav-content">
            <?php include('logo.php'); ?>
            <div class="box-nav-con">
                <ul class="box-nav">
                    <li class="box-nav-link">Secteur d'activité</li>
                    <li class="box-nav-link">Capacité de transport</li>
                    <li class="box-nav-link">Nos chauffeurs</li>
                    <li class="box-nav-link">Autres services</li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <?php include('texte.php'); ?>
    </main>
    <script src="script.js"></script>
</body>

</html>