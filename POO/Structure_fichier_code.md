# Structuration des fichiers, des classes, et du code. 

1. #### Les espaces de nom (namespace). 
    - Les espaces de nom permettent de regrouper des classes sous un meme nom. 
    En effet, en PHP on ne peut pas avoir deux classes qui ont le meme nom sauf si elles sont dans deux fichiers séparés. 
    - En php on utilise le mot clé **namespace** suivi du nom de cette espace et d'une point-virgule.
        -   ```
                <?php
                    declare(strict_types=1);

                    namespace Forum; 
                    
                        class Message
                        {}
                    namespace Messenger;

                        class Message
                        {}
            ```
            - ***Toutes les classe déclarées sous le namespace seront considérées comme lui appartenant.***
                - **Il est possible d'encapsuler l'espace dans des accolades {} lorsque les namespaces sont dans un meme fichier**
    - Pour faire référence à une classe en particulier, on préfixe son nom par son espace nom
        -   ```
                declare(strict_types=1);

                namespace Forum;
                class Message
                {}
                namespace Messenger; 
                class Message
                {}

                $forumMessage = new \Forum\Message;
                $messengerMessage = new \Messenger \Message;

                var_dump($forumMessage::class);
                var_dump($messengerMessage::class);
            ```
    - ***NB Par défaut, PHP possède un espace de nom global et si on utiliser sans "\" PHP considere que l'on fait référence à l'espace nom global.***
    ***à partir du momment ou une classe fait partie d'un espace de nommé, on ne peut plus y faire référence uniquement par son nom, il y a obligation d'y faire référence avec son espace noms*** 
    -     
        ```
            declare(strict_types=1);

            namespace Forum;
            class Message
            {}
            namespace Messenger; 
            class Message
            {}

            $forumMessage = new \Forum\Message;
            $messengerMessage = new \Messenger \Message;

            $date = new DateTime();

            var_dump($forumMessage::class);
            var_dump($messengerMessage::class);
        ```
        - NB: Il y a uara une erreur **Fatal error: Uncaught Error: Class "Messenger\DateTime" not found in ....** car PHP pense que l'on est toujours dans l'espace noms Messenger. 
            - ***Pour y faire référence on rajoute l'anti-slash devant***
                ```
                    $date = new \ DateTime();
                ```
    - Il est aussi pissible d'encapsuler les espaces de noms avec des accolades. 
        - ***Dans ce cas il fau aussi encapsuler les instanciation***
            ```
                declare(strict_types=1);

                namespace Forum{
                    class Message
                    {}
                }

                namespace Messenger
                {
                    class Message
                    {}
                }

                namespace{
                    $foremMessage = new\Message;
                    $messengerMessenger = new\Message;

                    var_dump($forumMessage::class);
                    var_dump($messengerMessage::class);
                }
            ```
2. #### Importation de classe d'un espace de noms different
    - Pour importer une classe d'une espace de noms different, on utilise le mot clé **use** suivi du **FQCN** ***(Fully Qualified Class Name (nom de classe entièrement qualifié))***
        ```
        namespace Messenger{
            class Message
            {}
        }

        namespace{
            use Messenger\Message;

            $messengerMessage = new Message;
            var_dump($messengerMessage::class);
        }
        ```
**NB: En ratique, il est preferable d'utiliser la synthaxe sans accolade. on definis l'espace de nom dans lequel on se trouve au début du fichier, puis on precise les classes provenant des autres espaces de nom avec le mot-clé use en dessous** 

**NB: Lorsu'on travaille avec les espaces de nom, PHP cherche toujours les méthodes dans l'espacede nom dans lequel il se trouve et si ce n'est pas le cas, alors il regarde dans l'espace globale. Lorsque l'on sait que la méthode se trouve dans l'espace global on l'indique à PHP en prefixant la fonction d'un backslash "\" et cela lui evite de faire la vérification**
```
    namespace Test
    {
        if(! \ is_int('n'est pas un entier')){
            echo 'Ceci n'est pas un entier';
        }
    }
```

3. #### Structuration des fichiers. 
    - **Un fichier pour une classe**: à chaque appel de classe on charge le fichier associé. Cela diminue la taille des fichiers, et PHP charge et analyse que le srict necessaire au moment de la requete.
    - **La recupération des fichiers** se fait l'aide de l'instruction :
        - **require_once('.../.../..php');**
            - ***Il est impératif d'utiliser*** **require_once** ***pour chaque fichier de chaque classe utilisée, meme si la classe se trouve dans une condition***
    - **Le chargement automatisée**:
        - Dans la bibliothéque standard PHP se trouve une fonction nommée **spl_autoload_register**
            - Lorsuq'on demande a PHP de charger une classe, il vérifie qu'elle existe.
                - Par defaut, la fonction 
                    1. **$fqcn** ***(full qualified class name)*** : contient Domaine\Forum\Message
                    2. On remplace les **\ par des /** et on ajout **.php** à la fin
                    3. On obtient Domaine/Forum/Message.php 
                    4. Puis on charge le fichier
                    -   ```
                            spl_autoload_register(static function(string $fqcn){
                                $path = str_replace('\\','/',$fqcn).'.php;
                                require_once($path);
                            });

                            use Domaine/Forum/Message;

                            $forumMessage = new Message;

                        ``` 

        - ***Imaginons que l'on est un repertoire*** **SRC** ***dans le quel on met tous les fichiers et que l'on choisi d'ajouter le prefixe*** **APP** ***dans tous les espace de noms.*** 
            - **SRC**
                - Domaine
                    - Forum
                        - Message.php
                            - namspace **App\Domaine\Forum**
                                - class Message
                                    {}
                    - User
                        - User.php
                            - namespace **App\Domaine\User**
                                - class User
                                    {}
            - **index**
                - ```
                    spl_autoload_register(static function (string $fqcn){

                        // On remplace le mot App par src 

                        $path = str_replace(['App','\\'],['SRC','/'],$fqcn).'.php;
                        require_once($path);
                    })

                    use App\Domaine\Forum\Message;
                    use App\Domaine\User\User

                  ```