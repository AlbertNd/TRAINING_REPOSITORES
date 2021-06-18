### Exemple de developement d'un model et ensuite de relation en Laravel. 

#### Blogue question response. 

##### Creation de model et de fichier de migaration pour les table question et reponses 
---
**NB** : pour les modeles on est ecrit toujours une majiscule pour la premiere lettre et au singulier et la table correspondant sera avec une minuscule au debut et un "s" à la fin. **C'est la convention de nomage**

- Modele question:
    - `php artisan make:modle Question -m`
- Modele reponse:
    - `php artisan make:modle Reponse -m`

- **Dans le dossier app**
    - **A la racine du dossier**:
        - Les fichiers **question.php** et **reponse.php** qui ont ete créer. 
            - Il contient:
                - Le modele question qui permettra de manipuler les questions 
                - Le modele reponse qui permettra de manipuler les reponses
        - Par defaut, il contient un fichier **user.php** qui permettra de manipuler les utilisateurs 
- **Dans le dossier database**
    - **Dans le dossier migrations**:
        - Deux fichier generés:
            - create_questions_table.php
            - create_reponses_table.php
---
##### Gestion des fichier de migration permettant de créer les table de question et de reponse
- Dans le fichier **question**: 
    - Rajout d'un champs texte et qui va contenir la question qu'aura publier un membre. 
        - `$table -> text('question');`
    - Identification du membre qui pose la question: 
        - Rajout d'une champs **user_id**
            - `$table->unsignedInteger('user_id');`
            - Indique au niveau de la structure des tbales que ce **user_id** fait reference à l' **id** qui se trouve sur la table **users**
                - Rajout d'une champs de clef etrangere:
                    - `$table->foreign('user_id')->references('id')->on('users');`
    - Vérification de la methode down()
- Dans le fichier **reponses**: 
    - Rajout d'un champs texte et qui va contenir la reponse qu'aura publier un membre. 
        - `$table -> text('reponse');`
     - Identification du membre qui a repondu: 
        - Rajout d'une champs **user_id**
            - `$table->unsignedInteger('user_id');`
            - Indique au niveau de la structure des tbales que ce **user_id** fait reference à l' **id** qui se trouve sur la table **users**
                - Rajout d'une champs de clef etrangere:
                    - `$table->foreign('user_id')->references('id')->on('users');`
        - Rajout d'une deuxieme clef etranger car la reponse fait reference à un **utilisateur** mais elle fait aussi reference à une **question**
            - `$table->unsignedInteger('questio_id');`
            - `$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');`
                - La methode onDelete permet d'indiquer que lorsque la question sera supprimer,grace à la valeur cascade, toutes les reponses qui font reference à cette question seront supprimées.
---
###### php artisan migrate
---
### Creation de [relation](https://laravel.com/docs/8.x/eloquent-relationships) . 

**NB**: 
- Si par exemple on a une question sur le site, cette question a un **user_id** qui renseignera l'**id** de l'utilisateur qui a ecrit cette question. 
- Grace aux relation, on va pouvoir créer une methode qui va **lier** la question à un utilisateur en particulier, et quand on souhaitera afficher les questions, on pourra plus facilement recuperer toutes les inforations sur l'utilisateur grace à l'id qui est renseigner dans la table question 

##### One-to-One:
- Relation qui definis quand une entrée d'une table correspond à une autre entrée dans une autre table 
    - ex : on a un membre du site qui est dans la table users et une table contact qui contient les numero de telephones, il y aura une entrée dans la table contact qui contiendra le numero de telephone d'une des membre qui se trouve dans une autre table 
        - une question ou une reponse est à chaque fois associer à un seul utilisateur (deux utilisateur ne peuvent pas rediger la meme question ou la meme reponse.(meme = id identique))
##### One-to-Many:
-  Relation qui se definis lorsque une entrée dans une table correspond à plusieurs entrée dans une autre table.
    - ex : dans le cas de question reponse, on aura une question qui pourait correspondre à une infités de reponses

#### definition d'une relation: 
- On se rend dans le modele:
    - On creer une methode:
        - utilisation de methode definissant les ralation 
            - Pour la relation **[one-to-one](https://laravel.com/docs/8.x/eloquent-relationships#one-to-one)** : **hasOne('le nom complet de la classe = le name space dans le quel se trouve la classe')**
                - `hasOne('...')` : on a un utilisateur qui est selectionner et on va venir recupere son numero de telephone par rapport à un identifiant
            - Pour la relation **[one-to-one inversée](https://laravel.com/docs/8.x/eloquent-relationships#one-to-one-defining-the-inverse-of-the-relationship)**: **belongsTo('le nom complet de la classe = le name space dans le quel se trouve la classe')**
                - `belongsTo('...')`: on a une numero de telephone qui est selectionner et on va venir recupere l'utisateur qui est associer à ce numero 
            - Pour la relation **[One-to-Many](https://laravel.com/docs/8.x/eloquent-relationships#one-to-many)** :**hasMany('le nom complet de la classe = le name space dans le quel se trouve la classe')**
                - `hasMany('...')`:on a un poste qui est selectionner et on va recupere tout les commentaire associer à ce post.ou dans notre cas, recuperation de toutes les reponse assiciées à une question. 




##### gestion des relation 
- **Dans le dossier app**:
    - Dans le fichier question:
        - On va y renseigner les relations. 
            - Il y a deux relation:
                1. Une question est lier à un utilisateur :
                    -   ```
                            public function user()
                            {
                                return $this->belogsTo('App\User');
                                // permet de lier la methode user au modele User
                            }
                        ```
                2. Une question est lier à une infinité de reponse 
                    -   ```
                            public function reponse()
                            {
                                return $this->hasMany('App\Reponse');
                                // permet de lier la methode reponse au modele Reponse
                            }
                        ```

    - Dans le fichier reponse:
        - On va y renseigner les relations.
            - Il y a une relations: 
                1. Une reponse est lier à un utilisateur :
                    -   ```
                            public function user()
                            {
                                return $this->belogsTo('App\User');
                                // permet de lier la methode user au modele User
                            }
                        ```
---
###### php artisan migrate
---