#### Les bases de donnée
- Une base de donnée peut etre vu comme une armoire: 
    - Tiroire = Table ***(representé sous la forme d'un tableau)***
        - Chaque tiroire contient des données differents
            1. Pseudo et information sur les visiteur
            2. Les message postés 
            3. ....
        - Les informations sont enregistrer sous forme d'un tableau, Les colonnes sont appelées **champs** et les lignes **entrées**  
#### L'accès au donnée de la base de donnée avec PDO
- Vérification du bon fonctionement et de l'activation de **PDO**
    - Acceder à PHPINFO `echo phpinfo();`
        - Voir le chemin de localisation du fichier de PHP **Loaded Configuration File** Le fichier ***php.ini**
        - Voir la liste des extention activée et vérifier que PDO est bien là. 
            - Si activé **PDO support enable** 
            - Si pas activé
                - Acceder au fichier php.ini
                    - sur linux 
                        1. **Sans le terminal:** Autres emplacement/ordinateur/etc .... ouvrir avec..
                        2. **Avec terminal** `
                            1. identification super utilisateur `$su` 
                            2. `$cd /etc/php/....`
                            3. Ouvrir vs code ave : `sudo code "le repertoire" --user-data-dir='.' --no-sandbox`
                    - Voir si les extentions son correctement activer
                        1. Recherche de **pdo** dans la liste des extention du fichier ***php.ini***

##### Connection à la base de donnée 
- Pour se connecter à une base de donnée MYSQL on utilise l'extension PHP **PDO**(PHP DATA OBJECT)
- On a besoin de 4 renseignement :
    1. le nom de l'hote
    2. la base de donnée
    3. l'identifiant **user**
    4. le mot de passe **Albert10?**
-   ```
        <?php
        // Souvent on identifie cet objet par la variable $conn ou $db
        $mysqlConnection = new PDO(
            'mysql:host=localhost;dbname=my_recipes;charset=utf8',
            'identifiant',
            'mot de passe'
        );
        ?>
    ```
- **Tester la presence d'erreur**
    - En cas d'erreur php envois une **exception**
    -   ```
            <?php
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }
            ?>
        ```
        - Ici PHP execute les instructions à l'interieur du bloc **try** et si il y a une erreur il rentre dans le bloc **catch** et fait ce qu'on lui demande à ce niveau là. et si tout se passe bien, il continue l'execution du code. 
#### Les requetes et recuperation des données. 
- L'objectif est de recuperer une liste contenu dans une variable sous forme de tableau stocker dans une base de donnée ***blog** **Mysql**.
- ***Etape à suivre :***
    1. prepare()
    2. execute()
    3. fetchAll()
- **prepare()**
    -   ```
            <?php
                $declarationListe = $db -> prepare(SELECT*FROM utilisateur)
            >
        ```
        - ***$declaratioListe*** Objet contenant la requete qu'il faut executer et les information à recuperer dans la base de donnée. 
- **execute() & fetchAll()**
    -   ```
            <?php
                $declarationListe -> execute();
                $declarationListe -> fetchAll();
            >
        ```
        - Les données seront recuperer sous forme d'un tableau.
## NB: Penser à verifier le bon fonctionnement de la requete dans phpmyamdin 

## NB: Penser toujours à activer les erreur lors de la connection à la base de donnée. 
```
    <?php
    $db = new PDO(
        'mysql:host=localhost;dbname=my_recipes;charset=utf8',
        'root',
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );
    ?>
```

#### Affichage des données 
- Etant donnée que c'est sous forme de tableau, il recommander d'utiliser la boucle **foreach** pour l'affichage des donnée. 
    -   ```
            foreach ($utilisateur as $utilisateur) {
            ?>
                <p><?php echo $utilisateur['Nom']; ?></p>
            <?php
            }
            ?>
        ```

## Construction des requete en fonctions des variables 

1. Identification à l'aide des **marques** 
    - **Les marque** sont des identifiants recoonnus par PDO pour etre remplacer lors de la préparation de la requete par les variables PDO
        - Par exemple lorsque l'on veut passer un element dans une URL ou un selecteur (Pour pouvoir afficher un commentaire en fonction de son auteur)
    - Pour ce faire, on passe des variables dans la requete SQL 
        1. ***(Si un seul argument)*** Les variables anonymes ou non nommée (***On remplace les point d'interrogation par les variables que l'on va soumettre à PDO*** )
            -   ```
                    <?php
                     $declarationListe = $db -> prepare(SELECT * FROM utilisateur WHERE nom = ?);
                     $declarationListe -> execute(['Albert']);
                     .
                     .
                     .

                    >
                ```
                - ***Ainsi, lors de l'execution de la requete, le point d'interogation sera remplacer par Albert***
            - De cette sorte, on peut aller chercher le nom dans l'URL **$_GET['Nom']** et le passer en tant que argument à remplacer (**Méthode pass tres securisé**)
        2. ***(si plusieurs arguments)*** les variable nommé. il sont prefixer par **:** et on leur donner un nom (***Recomander de donner le meme nom que la variable***) et se resultent par un tableau associatif.
            -   ```
                    <?php
                     $declarationListe = $db -> prepare(SELECT * FROM utilisateur WHERE nom = :nom AND prenom = :prenom);
                     $declarationListe -> execute([
                         'nom'=>$_POST['nom],
                         'prenom'=>$_POST['prenom],
                         'Age' => 33,
                         
                         ]);
                     .
                     .
                     .

                    >
                ```
#### Ajout, Modification et Suppression des données 
1. **L'ajout**
    - Pour ajouter une entrée :
        -   ```
                <?php
                    
                    $insertion = $bd ->prepare('INSERT INTO utilisateur (Nom, prenom, age) VALUE (:Nom, :prenom, :age )');

                    $insertion -> execute(
                            [
                                'Nom' => 'Brave',
                                'prenom' => 'Bahibigwi',
                                'age' => 34,
                            ]
                        )
                        // gestion d'erreur 
                        or die(print_r($db->errorInfo()))
                        ;
            ```
            - Le champs **id** ayant la propriete **AUTO_INCREMENT** dans la base de donnée MYSQL va lui attribuer une valeur automatique.
            - Si un champs a une valeur **booléenne** il est possible de lui attribuer la valeur ***1*** ou ***0*** respectivement pour ***true*** ou ***false***
2. **Modification**
    - Pour modifier une entrée 
        -   ```
                <?php

                    try{
                        $bd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','user','Albert10?', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
                    }catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }
                    $postData = $_POST; 

                    if(!isset($postData['id]) || !isset($postData['nom']) || !isset($postData['prenom'])){
                        echo 'Il manque des informations';
                        return; 
                    }

                    $id = $postData['id'];
                    $nom = $postData['nom'];
                    $prenom = $postData['prenom'];

                    $modifInsert = $bd -> prepare('UPDATE utilisateur SET Nom = :nom, prenom = :prenom WHERE id = :id');
                    $modifInsert -> execute(
                        [
                            'nom' => $nom,
                            'prenom' => $prenom, 
                            'id' => $id,
                        ]
                    )
                    // gestion d'erreur 
                        or die(print_r($db->errorInfo()))
                        ;
            ```
        - Pour le formulaire de modification, il faut absolument definir l'`ID` de l'utilisateur concernée. 
            - L'identifiant doit etre passer dans l'url anfin de pouvoir recuperer les données concerné                      
                - Recuperation des elements pour pouvoir les remetre dans le formulaire d'edition. 
                    ```
                        $presenceUtili = $bd -> prepare('SELECT * FROM Utilisateur WHERE Id = : id ); 
                        $presenceUtili -> excute([
                            'id' => $_POST['id'])
                        $result = $presenceUtili -> fetchAll(PDO::FETCH_ASSOC);
                    ```

3. **Suppression**
    - Pour supprimer une entrée
        -   ```
                <?php

                    try{
                        $bd =new PDO('mysql:host=localhost;dbname=blog;chars=utf8','user','Albert10?', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
                    }catch (Exception $e){
                        die('Erreur : '.$e->getMessage());
                    }

                    $suppInsert = $bd -> prepare('DELETE FROM utilisateur WHERE id = :id');
                    $suppInsert -> execute([
                        'id' => 2,
                    ])
                    // gestion d'erreur 
                        or die(print_r($db->errorInfo()))
                        ;
            ```
## Regles de bonne pratique