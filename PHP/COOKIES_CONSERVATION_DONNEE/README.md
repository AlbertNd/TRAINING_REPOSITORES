# La conservation des données garce au sessions et aux cookies 

## Les sessions 

- Les sessions permettent de conserver des variables sur toutes les pages du site.
    - En effet, le supervariable $_POST et $_GET ne conserve pas l'information en tre deux reque PHP alors que l'on souhaiterai que si l'on change de page que la connexion reste. pour ce faire, il faut utiliser les session
    - Elle permet d'avoir une supervariable **$_SESSION** qui va persister entre deux sessions
- Les étapes de gestion des sessions:
    1. La création d'une session unique:
        1. Un visiteur arrive sur le site 
        2. On d emande à créer une seesion pour lui 
        3. PHP genere un numero unique.
            - C'est un ID de session ou **PHPSESSID** PHP transmet automatiqueùent cet ID de page en page, en utilisant un **cookie**
    2. La création de variables pour la session 
        - Une fois la session générée, on peut créer une infinité de variables de session pour nos besoins.
            - Une variable qui contiet le nom du visiteur : `$_SESSION['nom']`
            - Une variable qui contient son prenom : `$_SESSION['']`
            - ....
                - ***Le serveur conserve ces variables même lorsque la page PHP a fini d'être générée , quelle que soit la page de votre site, vous pourrez récupérer le nom et le prénom du visiteur via la superglobale $_SESSION !***
    3. La suppression de la session. 
        - Pour activer ou détruire une session, deux fonctions sont à connaître :
            1.  **session_start()** : démarre le système de sessions. Si le visiteur vient d'arriver sur le site, alors un numéro de session est généré pour lui. 
            2.  **session_destroy()** : ferme la session du visiteur. Cette fonction est automatiquement appelée lorsque le visiteur ne charge plus de page de votre site pendant plusieurs minutes (c'est le timeout), mais vous pouvez aussi créer une page « Déconnexion » si le visiteur souhaite se déconnecter manuellement.
        - **Il faut appeler session_start() sur chacune de pages AVANT d'écrire le moindre code HTML ou PHP (avant même la balise  <!DOCTYPE>  ). Si vous oubliez de lancer session_start(), vous ne pourrez pas accéder à la variable superglobale   $_SESSION  .**
#### Exemple de mis en place d'une session 

1. Dans le fichier `Home.php`
    - Utilisation de la fonction **session_start()** et qui donne la surpervariable **$_SSESSIOn**
    -   ```
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

            <body class="d-flex flex-column min-vh-100">
                <div class="container">
                    <?php include_once('login.php'); ?>

                    <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                        <div>
                            <h1>Le site en question</h1>
                            voila le deux
                        </div>


                        <a href="logout.php">
                            <button>deconnexion </button>
                        </a>


                    <?php endif; ?>
                </div>
            </body>

            </html>
        ```

2. Dans le fichier `Login.php`
    - On va enregistrer le mail de l'utilisateur en session à la place de la variable ***$loogedUser**
    -   ```
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
            <?php else : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['LOGGED_USER'] . ' bienvenue' ?>
                </div>
            <?php endif; ?>
        ```
        - Si l'on souhaite fermer manuelement la session, on cree un lien ***Déconnection** amenant vers une page `logout.php` qui fait appel à la fonction **session_destroy()**
3. Dans le fichier `logout.php`
    -   ```
            <?php   
            session_start(); // Pour etre sur que l'on utilise la meme session
            session_destroy(); //Destuction de la session 
            header("location:/Demo/Home.php"); // redirection vers la page home.php apres la destruction 
            exit();
            ?>
        ```
    -  Autre solution 
        -   ```
                if(isset($_POST['logoutButtonName'])) {
                    session_destroy();
                    unset($_SESSION['nameOfSessionToBeDestroyed']);
                    header('location:login.php');
                }
            ```
**NB:les sessions peuvent servir dans de nombreux cas sur votre site (et pas seulement pour retenir un nom et un prénom !).**

Quelques exemples :

***Imaginons un script qui demande un identifiant et un mot de passe pour qu'un visiteur puisse se « connecter » (s'authentifier). On peut enregistrer ces informations dans des variables de session et se souvenir de l'identifiant du visiteur sur toutes les pages du site !***

***Puisqu'on retient son identifiant et que la variable de session n'est créée que s'il a réussi à s'authentifier, on peut l'utiliser pour restreindre certaines pages de notre site à certains visiteurs uniquement. Cela permet de créer toute une zone d'administration sécurisée : si la variable de session login existe, on affiche le contenu, sinon on affiche une erreur.***

***On se sert activement des sessions sur les sites de vente en ligne. Cela permet de gérer un « panier » : on retient les produits que commande le client quelle que soit la page où il est. Lorsqu'il valide sa commande, on récupère ces informations et… on le fait payer.***


## Les cookies 
- Un cookie est une petit fichier que l'on enregistre sur l'ordinateur du visiteur. Il contient du texte et permet de retenir des information sur le visiteur. **ce ne sont pas des virus** 
    - Par exemple: on inscris dans un cookie le pseudo du visiteur. Comme ça, la prochaine fois qu'il viendra sur le site, on pourra lire son pseudo en allant regarder ce que son cookie contient
- Chaque cookie stocke généralement une information à la fois. Si on veut stocker le pseudonyme du visiteur et sa date de naissance, il est donc recommandé de créer deux cookies.

#### Ecrire un cookie 
- Tout comme une variable, un cookie a un **nom** et une **valeur**
- Pour ecrire un cookie, on utlise la fonction PHP **setcookie**
- Il prend trois paramettres:
    1. Le nom du cookie (LOGGED_USER) 
    2. La valeur du cookie (mail utilisateur)
    3. La date d'expiration du cookie, sous form ***timestamp***
        - **timestamp** : c'est le nombre de secondes écoulées depuis le ***1er janvier 1970***. Le timestamp est une valeur qui ***augmente de 1 toutes les secondes***. Pour obtenir le timestamp actuel, on fait appel à la fonction **time()** . Pour définir une date d'expiration du cookie, il faut ajouter au « moment actuel » le nombre de secondes au bout duquel il doit expirer.
            - si on veut supprimer le cookie dans un an, il faudra donc écrire : `time() + 365*24*3600` 
#### Sécuriser un cookie avec les propriétés