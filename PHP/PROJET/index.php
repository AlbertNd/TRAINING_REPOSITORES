<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aceuilles</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    // inlcusion de la calasse de connection à la base de donnée
    include('App/Model/ConnectionDataBase.php');
    $connectionBaseDonne = new connectionDataBase();
    $datas = new connectionDataBase();

    // inclusion du controlleur du formulaire de login
    include('App/Controller/loginForm.php');
    // Inclusion du formuaire d'enregistrement
    include('App/Controller/enregistreForm.php');
    // inclusion du formulaire d'enregistrement
    include('App/Controller/enregistrePost.php');
    // Affichage du formaulire de publication de post
    if(isset($_POST['ajoutPost'])){
        $_SESSION['AJOUT_POST'] = 1;
    };
    // Annulation de l'affichage du formulaire de publication de post
    if(isset($_POST['Annule'])){
        $_SESSION['AJOUT_POST'] = 0;
    };


    ?>
    <div>
        <?php include('App/Views/Pages/navbar.php') ?>
    </div>
    <div class="px-10">
        <div class="">
            <?php include('App/Views/Pages/Acceuille.php'); ?>
        </div>
    </div>
</body>

</html>