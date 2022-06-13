<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Page site</title>
</head>

<?php include('Control/Verification.php'); ?>
<?php require_once('Control/ConnectionBD.php');?>



<body>
    <div>
        <?php include('Vues/navbar.php')?>
    </div>
    <div class="contenaire">
        <?php include('Formulaire/Login.php');?>

        <?php if($_SESSION['LOGGED_USER']):?>
                <?php include('Vues/Acceuille.php');?>
        <?php endif; ?>
    </div>
</body>

</html>