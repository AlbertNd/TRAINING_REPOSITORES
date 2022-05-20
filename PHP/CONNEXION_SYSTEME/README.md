# La protectcion d'une page par un mot de passe

- Le but est d'avoir un formulaire de connexion avec e-mail et mot de passe et une fois connecter on affiche un message du type ***bonjour mail utilisateur et bienvenu*** 
    - La page souhaiter ne s'affiche que si l'utilisateur est connecter. 

##### Elaboration du plan
1. Soumission d'une email et d'un mot de pass dans un formualire de connexion 
    - Si le formulaire est valide on affiche un message de succès sinon on affiche une message d'erreur. la suite sera affiche que pour les utiisateur ayant eu un message de succès
2. Schematisation du code 
    - Le formulaire sera integré dans la page d'acceuil
        - Trois situation possible:
            1. pas connecté
            2. mot de pass invalid
            3. connexion avec succès
2. Deux pages :
    1. **login.php** : Qui va contenir: 
        1. La validation du formulaire
            - Une condition **if()** pour verifier si le champs de saisie est vide **empty($_POST[])**
                - returne une variable **$errorMessage** contenant un message pour indique qu'il faut compléter les champs de connexion.
            - Une condition **elseif()** pour verifier si la variable est declarer et si celle ci n'est pas vide. 
                - Une condition **if()** les informations saisis sont celle attendu. 
                    - Si Oui : Création d'une variable ***Utilisateur connecté*** == **$loggedUser**
                    - Si nom : Une conditon **else()** retournant une variable **$errorMessage** contenant un message pour indique que les information saisie ne sont pas les bonnes. 
        -   ```
                if (empty($_POST['email']) || empty($_POST['password'])) {
                    $errorMessage = sprintf('Veuillez introduire vos informations de connexion');
                } elseif (isset($_POST['email']) || isset($_POST['password'])) {

                    if (
                        $_POST['email'] === "Albert" &&
                        $_POST['password'] === "Ndizeye"
                    ) {
                        $loggedUser = [
                            'email' => $_POST['email'],
                        ];
                    } else {
                        $errorMessage = sprintf('Les information ne sont pas bon);
                    };
                }
                ?>
            ```
        2. Affichage du formulaire de connexion pour un utilisateur qui n'est pas connecté. 
            - Une condition si la variable ***Utilisateur connecté*** n'est pas déclarer  `<?php if(!isset($loggedUser)):?>`
                - Balise debut formulaire et ses attributs
                    - Condition en cas de message d'erreur `<?php if(isset($errorMessage))>`
                        - Affiche du message d'erreur `<?php echo $errorMessage; ?>`
                    - Fin de la condition message d'erreur `<?php endif; ?>`
                    - Les balises des champs d'insertion du formulaire
                - Balise de fin du formulaire
            - Une condition de succès de connexion `<?php else;?>`
                - Aficche du message de succès
            - Fin de la condition `<?php endif;?>` 
        -   ```
                <?php if (!isset($loggedUser)) : ?>
                    <form action="home.php" method="POST">


                        <?php if (isset($errorMessage)) : ?>
                            <H1>
                                <?php echo $errorMessage; ?>
                            </H1>
                        <?php endif; ?>

                        <label for="email">Email</label>
                        <input type="text" name="email" id="">
                        <label for="password">passxord</label>
                        <input type="password" name="password" id="">
                        <button type="submit">Envoyer</button>

                    </form>

                <?php else : ?>
                    <h1>
                        <?php echo $loggedUser['email']; ?> bienvenu
                    </h1>
                <?php endif; ?>
            ```


    2. **home.php** : qui doit maintenant inclure une formulaire de connexion et une condition sur l'affichage des recettes.


