## Projet de récapitulation 
### Création d'une plate forme de post d'offre pour chaufeur 

#### Documenation du projet

##### Description

# Architecture dossier 
1. Fichier ***index.php***
2. Dossier **Controle**
    1. Fichier ***Vérification***
3. Dossier **Formulaire**
    1. Fichier ***login.php***
    2. Fichier ***logout.php***
4. Dossier **Vues**
    1. Fichier ***Acceuille.php***
    2. Fichier ***Navabar.php***
#### Documentation technique 
1. ***[Index.php](#index)***
    - Debut de ssesion 
    - Head HTML 
        - Connection ***Tailwind CDN***
    - Inclusion du fichier de ***[vérification.php](#verification)*** 
    - Body
        - Inclusion des composant de page :
            1. La barre de ***[navigation](#barre-de-navidation)***:
                - Les liens vers les autres pages  
                - Condition d'affichage si connecté ou pas 
                    - Si connecté
                        - Le nom et prenom de 'utilisateur 
                        - Lien de déconnection 
            2. Le formulaire de connection ***[login.php](#login)***
            3. La vues 
2. ***[Verification.php](#verification)***
    1. Vérification du replissage des champs de saisie 
        - Si nom : message d'erreur 
        - Si oui : suite execution 
    2. Vérification de l'existance des variable saisi 
        - Si non : message d'erreur 
        - Si oui :
            - Vérification des information de connections saisi: 
                - si incoorecter: message d'erreur 
                - Si correcte : Creation d'une varibl $_SESSION['LOGGED_USER'] correspondant au mail de l'utilisateur.
#### Les scripts 

## Index
```
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
```
## Verification

```
<?php

    if(empty($_POST['email']) || empty($_POST['password'])){
        $message = sprintf('Veuillez introduire vos informations de connection');
    }elseif(isset($_POST['email']) || isset($_POST['password'])){
        if($_POST['email'] === 'Albert@gmail.com' 
        &&
        $_POST['password'] === 'Albert'){
            $_SESSION['LOGGED_USER'] = $_POST['email'];
        }else{
            $message = sprintf('Les information saisies ne sont pas correctes');
        }
    }

?>
```
## Login
```
<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>

    <div class="contenaire flex justify-center">
        <form action="index.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
                <div class="alert arte-danger" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2"> email</label>
                <input type="email" name="email" id="" class="border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-3">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de pass</label>
                <input type="password" name="password" id="" class="border rounded w-full py-2 px-3 text-gray-700" >
            </div>
            <div class="mb-3 flex justify-center">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded "> connecter</button>
            </div>

        </form>

    </div>

<?php endif; ?>
```

## Barre de navidation 
```

<div class="container flex flex-wrap justify-between items-center mx-auto">
    <div>
        <ul class="flex">
            <li class="p-3">lien 1</li>
            <li class="p-3">lien 2</li>
            <li class="p-3">lien 3</li>
        </ul>
    </div>
    <div>
        <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
            <a href="#">
                <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                    Se connecter 
                </button>
            </a>
        <?php else : ?>
            <div class="container flex flex-wrap justify-center">
                <div class="mr-10">
                    <?php $_SESSION['LOGGED_USER'] ?>
                </div>
                <div>
                   <a href="/Formulaire/Logout.php">
                       <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                           Deconnection
                       </button>
                   </a> 
                </div>

            </div>

        <?php endif; ?>
    </div>

</div>

```