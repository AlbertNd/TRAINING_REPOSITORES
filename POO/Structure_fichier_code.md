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

3. #### Structuration des fichiers. 
    - **Un fichier pour une classe**: à chaque appel de classe on charge le fichier associé. Cela diminue la taille des fichiers, et PHP charge et analyse que le srict necessaire au moment de la requete.