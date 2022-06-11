<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div>
        <?php include('Vues/navbar.php') ?>
    </div>

    <div class="flex justify-center">
        
            <div class="mt-32">
                <?php include_once('Formulaire/login.php'); ?>
                
                <?php if (isset($loggedUser)) : ?>
                    <h1>Site de Recettes !</h1>
                    <H1>Voila</H1>
                <?php endif; ?>
            </div>

        
    </div>

</body>

</html>