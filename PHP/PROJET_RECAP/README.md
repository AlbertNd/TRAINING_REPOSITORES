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
            1. La barre de ***[navigation]()***:
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
    <?php session_start(); // activation de la session et donnant la surpervariable $_SESSION
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>test</title>
    </head>
        <?php
            require_once('Control/Verification.php');
        ?>
        <body>
            <div>
                <?php include('Vues/navbar.php') ?>
            </div>

            <div class="flex justify-center">
            
                <div class="mt-32">

                    <?php include_once('Formulaire/login.php'); ?>

                    <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                        <div>
                            <?php include('Vues/Acceuille.php') ?>
                        </div>
                    <?php endif; ?>
                
                </div>
            
            </div>
        
        </body>

    </html>
```
## Verification

```
<?php
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $message = sprintf('Veuilez mettre les infos de connexion');
    } elseif (isset($_POST['email']) || isset($_POST['password'])) {
        if (
            $_POST['email'] === 'albert@gmail.com'
            &&
            $_POST['password'] === 'albert'
        ) {
            // Enregistrement de l'email de l'utilisateur en session 
            
            $_SESSION['LOGGED_USER'] = $_POST['email'];
        } else {
            $message = sprintf('Les infos introduis ne sont pas bonne');
        }
    }
?>
```
## Login
```
 <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
        <form action="Home.php" method="POST">
            <?php if (!isset($loggedUser)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $message ?>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Email address</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    <?php endif; ?>
```

## Barre de navidation 
```

<div class="container flex flex-wrap justify-between items-center mx-auto">
    <div>
        <ul class="flex">
            <li class="py-2 pr-4 pl-3">Lien 1 21</li>
            <li class="py-2 pr-4 pl-3">Lien 2</li>
            <li class="py-2 pr-4 pl-3">Lien 3</li>
        </ul>
    </div>
    <div>

        <?php if (!isset($loggedUser)) : ?>

            <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                connection
            </button>

        <?php else : ?>

            <div class=" container flex flex-wrap justify-between mx-auto">
                <div class="mr-10">
                    <?php echo $loggedUser['email']; ?>
                </div>

                <div>
                    <a href="/Formulaire/logout.php">
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
                            déconnection
                        </button>
                    </a>
                </div>

            </div>

        <?php endif; ?>
    </div>
</div>

```