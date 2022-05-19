#### Les URL (Uniform Resource Locator). 
- Il permettent de transmettre des infomations. 
- Le point **?** separe le nom de la page PHP des parametres Le annotations que l'on voit les points **?** sont des données, des paramettres que l'on envoie à une page PHP qui va les recupere dans des variable.
    -  Suposons que nous aiyons une page ***contact.php*** et une page ***monsite.php*** si l'on souhaite envoyer des information à la page ***contact.php*** ces informations vont figurer à la fin de de l'URL comme ci dessous: 
        - `http://www.monsite.com/contact.php?nom=Dupont&prenom=Jean`
- Le paramettres s'enchainent selon la forme **nom=valeur** et sont séparé les uns des autres par le symbole **&**. 
    -`page.php?param1=valeur1&param2=valeur2&param3=valeur3&param4=valeur4…`
- Lien avec des paramettre: 
    - supposons que nous ayons deux fichiers  sur le site ***index.php*** et ***bonjour*** et que nous souhaitons faire un lien dans index.php qui transmet des informations dans l'URL. 
        - dans index.php : `<a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>`
            ```
                "&"  dans le code a été remplacé par "&amp" dans le lien.
                Ça n'a rien à voir avec PHP : simplement, en HTML, on demande à ce que les &  soient écrits &amp;  dans le code source. Sinon le code ne passera pas la validation W3C.
            ```
#### La soumission d'un formulaire. 
- Les donnée soumises se retrouve dans l'URL exactement comme pour le lien.
    - Avec la balise **form** et son attribut **method**
    - deux ethodes permettent d'envoyer les données d'un formulaire: 
        - **get** : les données transiteront par l'URL, comme on l'a appris précédemment. On pourra les récupérer grâce au tableau (array) **$_GET**
        - **post** : les données ne transiteront pas par l'URL, l'utilisateur ne les verra donc pas passer dans la barre d'adresse. Cette méthode permet d'envoyer autant de données que l'on veut, ce qui fait qu'on la privilégie le plus souvent
            -   ```
                    <form action="fichier qui recoit" method="GET">
                        <input name="nom">
                        <input name="prenom>
                    </form>
                ```
#### Récupération des parametres 
- Supposons un formulaire 
    -   ```
            <form action="submit_contact.php" method="GET">
                <div>
                    <label for="email">email</label>    
                        <input type="email" name="email">
                </div>
                <div>
                    <label for="message">message</label>    
                        <textarea placeholder="ecrivez votre message" name="message"></textarea>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        ```
    - ***Le formulaire va etre converti en lien*** `submit_contact.php?email=utilisateur%40exemple.com&message=Bonjour` ***et ensuite les information vont etre recuperer par PHP dans le fichier*** `submit_contact`
    - Lors de la soumission une ***superglobale :*** **"$_GET ou $_POST"** va contenir les données envoyées. 
        - ***Il s'agit d'un tableau associatif dont les clés correspondent au noms des parametres envoyé dans l'URL.***
        - Soit le fichier index.php   
            -   ```
                    <form action="submit_info.php" method="get">
                        <div>
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="">
                        </div>
                        <div>
                            <label for="Message">Message</label>
                            <textarea placeholder="Tapez votre message ici" name="message" id=""></textarea>
                        </div>
                        <button type="submit">Envoyer</button>
                    </form>
                ```
        - Le fichier submit_info.php
            -   ```
                    <h1>Message bien recus</h1>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Rappel des vos information</h5>
                            <p class="card-text"><?php echo $_GET['name']?></p>
                            <p class="card-text"><?php echo $_GET['message']?></p>
                        </div>
                    </div>
                ```

#### La fonction isset() et empty():
- Elle permet de tester si une varibale existe et peut alors etre utiliser pour affcher une message d'erreur en cas d'absence de la variable. 
    -   ```
            <?php
                if(!isset($_GET['name]) || !isset($_GET['message'])){
                    echo 'Il faut un non et un message pour soumetre le formulaire';
                }
            
            ?>
        ```
    -   ```
            <?php
                if (
                    (!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
                    || (!isset($_GET['message']) || empty($_GET['message']))
                    )
                {
                    echo('Il faut un email et un message valides pour soumettre le formulaire.');
                    return;
                }
        ```
    - [VOIR AUSSI](https://www.php.net/manual/fr/filter.examples.validation.php)
###### empty()
    ```
        <?php if (empty($_POST['name']) || empty($_POST['message'])) : ?>
            <div>
                <h2>Il faut un non et un message pour soumetre le formulaire</h2>
                <button>
                <a href="./">retour</a>
                </button>
                
            </div>
        <?php else : ?>
            <h1>Message bien recus</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rappel des vos information</h5>
                    <p class="card-text"><?php echo $_POST['name'] ?></p>
                    <p class="card-text"><?php echo $_POST['message'] ?></p>

                </div>
            </div>
        <?php endif; ?>
    ```


#### Sécurisation du code en bloquant l'exécution de code javascript
-  Pour ignorer le code HTML, il suffit d'utiliser la fonction **htmlspecialchars**
    - Elle va transformer les chevrons des balises HTML `<`  et `>` en `&lt;` et `&gt;` et cela provoquera l'affichage de la balise plutot que son execution. 
        - Bref, tout ce qui est affiché et qui vient, à la base, d'un visiteur, il faut penser à le protéger avec  ***htmlspecialchars***
- Si on l'on souhaite retire les balises HTML que le visiteur a tenté d'envoyer plutot que de les afficher, on utilise **strip_tags**

## Le partage des fichiers via le formulaire

#### La supervariable $_FILES :

#### Parametrage du formulaire d'envois de fichier
- Dès que le formulaire propose aux visiteurs d'envoyer un fichier, on ajout l'attribut **enctype="multipart/form-data"** à la balise `<form>`. 
    - `<form action="fichier de reception" method="POST" enctype="multipart/form-data">`
    - Ainsi le navigateur du visiteur sait qu'il s'apprete à envoyer des fichiers.
- Ajout de la balise `<input type="file"/>` permetant d'envoyer un fichier
    - Dans le ficher qui envoit:
        -   ```
                <form action="bonjour.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="">
                    </div>
                    <div>
                        <label for="Message">Message</label>
                        <textarea placeholder="Tapez votre message ici" name="message" id=""></textarea>
                    </div>
                    <div>
                        <label for="fichier">Votre cv </label>
                        <input type="file" name="fichier"/>
                    </div>
                    <button type="submit">Envoyer</button>
                
                </form>
            ```
    - Le fichier qui recoit 
        - Au momment ou lapage PHP s'execute, le fichier a ete envoyé sur le serveur mais est stocker dans un dossier temporaire. et qu'il faut decider si on l'accepte ou non.
            1. ***On teste si le fichier à bien ete envoyer:***
                -   ```
                        <?php
                            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                            if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)
                            {
                            
                            }
                        ?>
                    ```
            2. ***Vérification de la taille du fichier***
                -   ```
                        <?php
                            // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                            if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)
                            {
                                    // Testons si le fichier n'est pas trop gros
                                    if ($_FILES['fichier']['size'] <= 1000000)
                                    {
                            
                                    }
                            }
                        ?>

                    ```
            3. ***Vérification de l'extension du fichier***
                -   ```
                        <?php
                            $fileInfo = pathinfo($_FILES['fichier']['name']);
                            $extension = $fileInfo['extension'];
                        ?>
                    ```
                    - Une fois l'extension récupérée, on peut la comparer à un tableau d'extensions autorisées, et vérifier si l'extension récupérée fait bien partie des extensions autorisées à l'aide de la fonction **in_array()**

                        -   ```
                                <?php
                                    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                                    if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0)
                                    {
                                            // Testons si le fichier n'est pas trop gros
                                            if ($_FILES['fichier']['size'] <= 1000000)
                                            {
                                                    // Testons si l'extension est autorisée
                                                    $fileInfo = pathinfo($_FILES['fichier']['name']);
                                                    $extension = $fileInfo['extension'];
                                                    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                                                    if (in_array($extension, $allowedExtensions))
                                                    {
                                                    
                                                    }
                                            }
                                    }
                                ?>
                            ```
            4. ***Validaton de l'upload du fichier***
                - On accepte le fichier en appellant **move_uploaded_file()**
                -   ```
                        <?php
                        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
                        if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)
                        {
                                // Testons si le fichier n'est pas trop gros
                                if ($_FILES['fichier']['size'] <= 1000000)
                                {
                                        // Testons si l'extension est autorisée
                                        $fileInfo = pathinfo($_FILES['fichier']['name']);
                                        $extension = $fileInfo['extension'];
                                        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                                        if (in_array($extension, $allowedExtensions))
                                        {
                                                // On peut valider le fichier et le stocker définitivement
                                                move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($_FILES['fichier']['name']));
                                                echo "L'envoi a bien été effectué !";
                                        }
                                }
                        }
                        ?>
                    ```