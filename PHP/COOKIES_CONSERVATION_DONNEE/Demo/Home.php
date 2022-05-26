<?php session_start(); // activation de la session et donnant la surpervariable $_SESSION?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>test</title>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <?php include_once('login.php');?>
        
        <?php if(isset($_SESSION['LOGGED_USER'])):?>
            <h1>Le site en question</h1>
            voila le deux

            <a href="destroyed.php"> deconnexion</a>
            <button type="reset"> <?php session_destroy();?> destroy</button>

            <?php endif;?>
    </div>
</body>
</html>