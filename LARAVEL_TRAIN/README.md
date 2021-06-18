# Formation pour débutant LARAVEL 

## <div align="center"> Création d'appliation web. </div> 
- Les outils réquis :
    - [Composer](#Composer)
    - [Blade](#BLADE)
    - [Jetstream](#JETSTREAM)
    - [Environement de developement (IDE)](#Environement-de-developement )
- Les concepts important :
    - [Architecture MVC](#Architecture-MVC)
    - [Architecture de Laravel](#Architecture-de-LARAVEL)
        - [Dossiers](#Les-dossiers)
        - [Fichiers](#Les-fichiers)
    - [Confuguration de base](#Configurations-utiles)
    - [Gestion de la base des données](#Gestion-de-la-base-de-donnée)
        - [Migration](#Les-migrations)
            - [Execution de migration](#Executer-la-migration)
            - [Gestion de migration](#Gestion-des-migrations)
        - [Création table](#Creation-des-tables)
        - [Contrainte de clef etrangere](#Contrainte-de-clef-etrangere)
        - [Seeding](#SEEDING)
            - [Le factory & Faker](#Factory-et-Faker) 
            - [Création factory](#Création-du-factory )
            - [Création seeder](#Création-du-seeder)
    - [Authentification sans jetstream ](#Authentification-sans-jetstream)

- Conception
    1. [Routes](#Les-Routes)
        - [Emplacement des routes](#Emplacement-des-routes)
        - [Methodes: GET POST PUT DELETE](#Methodes)
        - [Création d'une route](#Creation-route)
        - [Injection de dépendance](#Injection-de-dépendance)
        - [Liste des routes](#Commande-pour-liste-les-route )
        - [Midelware](#Les-middlewares)
            - [Creation d'un middleware](#Creation-de-middleware)
            - [Middleware Auth et Guest](#Deux-middleware-Auth-et-Guest)
    2. [Controleurs](#Les-Controleurs)
        - [Emplacement des controleurs ](#Emplacement-des-controleurs)
        - [Création controleur](#Création-controlleur)
        - [Générer un controleur avec l'option resource](#Generation-avec-option-resource)
        - [Changement de la nomination des URL](#Changement-nomination-URL)
    3. [Liaison route et controlleur](#Liaison-route-et-controlleur)
    4. [Les modeles](#Les-Modeles)
        - L'ORM [Eloquent](https://laravel.com/docs/master/eloquent) (Objet Relational Mapping)
        - [Création model](#Creation-modele)
    5. [Les relations](#Les-relations )
    6. [Vues](#Les-vues)
        - [Generation de vue](#Generer-une-vue)
        - [Layout global](#Layout-global)
            - [Formulaire](#Les-formulaires)
            - [Liaison layout css js](#Lier-le-contenu-de-la-layout-globale-aux-css-et-js)
    
    7. [Les relations](#Les-relations)

- [Etapes d'un projet](#Les-Etapes) 


----------------------------------------------------------------------------
# Composer

[Retour](#Formation-pour-débutant-LARAVEL)

[Composer](https://getcomposer.org/):
- C'est un gestionaire de dépendance utiliser par LARAVEL et permet d'automatiser/facilité un certain nombre de procedures 
    - NB: *les composants de Laravel sont aussi traités comme des dépendances.*
- Il fonctionne en ligne de commande
- Pour créer une application LRAVEL avec composer: 
    - `composer create-project laravel/laravel monapp`
- Pour les mises à jour ultérieures:
    - `composer update`
-----------------------------------------------------------------------------
# Environement de developement 

[Retour](#Formation-pour-débutant-LARAVEL)

- [EDI](https://fr.wikipedia.org/wiki/Environnement_de_d%C3%A9veloppement)

-----------------------------------------------------------------------------
# Architecture MVC 

[Retour](#Formation-pour-débutant-LARAVEL)

- #### Principe : Sépartion d'un fichier en trois fichiers distincts:
    - **Model**:
        - Contient tout ce qui est communication avec les données (recupération des donnée, mis à jour des resultat, suppression etc ...)
    - **View**
        - Contine tout ce que l'utilisateur voit (le html, php pour les données dynamique , etc ..)
    - **Controller**
        - Il fait la jonction entre les views et le model
        - Contient out ce qui est logique de l'application (Control de securité, demande de donnée au model, transmission des données à la view, sanitization d'un formulaire, etc ...  ) 
- #### Fonctionnement :
    1. L'utilisateur fait une requete HTTP, vers le site, avec un **URI** (identifiant qui mene à une ressource). 
    2. L'URI mener au bon controlleur(**il y a un controleur par page**). 
    3. Le controleur appelle un model, selectionne des données. 
    4. Le model transmet au controlleur les donnée demandées. 
    5. Le controle transmet les données traitées à la view. 
    6. La view genere du HTML. 
    7. Le view generées sont transmis au controleur. 
    8. Le controlleur transmets, sous forme de reponse HTTP, une page complete à l'utilisateur 
------------------------------------------------------------------------------
# Architecture de LARAVEL

[Retour](#Formation-pour-débutant-LARAVEL)

- ### Les dossiers 
    1. **APP**:
        - C'est le coeur du site et il contient les differents fichiers MVC 
    2. **Bootstrap**:
        - Permet d'initialiser les diferent service utilisé par LARAVEL
    3. **Config**:
        - Il contient tous les fichiers de configuration et qui sont séparés par theme.
    4. **Database**:
        - Il contien tout ce qui est en rapport avec les base de donneés:
            - Migrations
            - Factories
            - seeders 
        - Il permet de gerer tout ce qui va cr&er les tables et les alimenter 
    5. **Public**:
        - **Seul dossier accecible depuis le web**
            - Lorsque les visiteur viennent sur le site, ils sont sur le fichier **index.php** qui se trouve dans le dossier public 
            - Tous les dossier accessible depuis le web(js,css,...) devront etre dans ce dossier 
    6. **Resource**:
        - Il contient toutes les views et également d'autre fichier qui vont generer d'autre fichier javascript ou css (SASS, fichier javascript non compilés à envoyé au dossier public,etc...)
    7. **Routes**:
        - Il contient toutes les routes de notre site. 
            - **routes** : URI càd une identifiant de ressource qui est lier à une action (un controlleur) 
    8. **Storage**:
        - Il contient tous les fichier generé par le framework **il ne faut surtout pas le toucher**
    9. **Tests**:
        - Il contient les fichier des tests unitaire (par exemeple pour ceux qui uilise PHP unit c'est à cet endroit que les tests iront)
    10. **Vendor**:
        - Il contient toutes les dependances du site-web, et qui sont gerer par composer. 
        - Il est totalement dependant et gere par composer

[Retour](#Formation-pour-débutant-LARAVEL)

- ### Les fichiers: 
    - **.env**: 
        - Laravel utilise une dependance PHP gerer par composer et qui permet de creer un fichier **.env** et qui contient une variable d'envirronement et une valeur `APP_NAME = Laravel` et ces valeurs vont pouvoir etre utiliser dans la configuration 
        - But : Entre le serveur de developpement et celui de production il va y avoir beaucoup de valeur qui vont changer: (URL de base, Donnée de connection à la DB, envois de mail etc,... )
        L'interet est qu'on ne devra pas toucher à d'autre fichier que celui ci pour la mise à jour de notre serveur de production. 
    - **artisan**:
        - Il permet d'acceder à plusieurs outils, en ligne de commande, qui facilite la tache de developpement 

[Retour](#Formation-pour-débutant-LARAVEL)

--------------------------------------------------------------------------------

# Configurations utiles

[Retour](#Formation-pour-débutant-LARAVEL)

[Doc Laravel configuration ](https://laravel.com/docs/8.x/configuration#environment-variable-types)

- **Dans le fichier .env**:

    - Les paramettres smtp: 
        - Si en local, on souhaite que tout les mail que l'on envois, et peu importe l'adresse e-amil auquel on les envois, on voudrait qu'il soit interpreter par [mailhog](https://nishchay.io/blog/mailhog-installation-on-ubuntu)  

        ```
            MailHog est un outil de test de-mail open source et destiné principalement aux développeurs. 
            
            Construit avec le langage de programmation Go:

            - Il permet de tester plus efficacement les capacités d’envoi et de réception de mail d'une application web.
            - Il peut être utilisé sur plusieurs systèmes d’exploitation, dont Windows, Linux, FreeBSD et macOS.
            - Il résout un grand nombre des problèmes majeurs des tests d‘e-mail.

            Supposons que l'on développe un site web dans un environnement de développement local. Si l'on souhaite tester un formulaire de contact ou tout autre e-mail, la tâche peut être ardue.

            En effet, dans un environnement de développement local, il ne fonctionne presque jamais pour de multiples raisons.
        
        ``` 

        NB : *Il va nous permettre de tester les envois de ail sans poluer les boite email*

        - Modification des paramettre pour configurer mailhog dans env
                
        ```       
            MAIL_MAILER=smtp
            MAIL_HOST=mailhog
            MAIL_PORT=1025
            MAIL_USERNAME=null
            MAIL_PASSWORD=null
            MAIL_ENCRYPTION=null
            MAIL_FROM_ADDRESS=null
            MAIL_FROM_NAME="${APP_NAME}"

        ```
- **Dans le dossier Config**:
NB:es valeur de configurations ne se retourvent pas dans le fichier env car ses valeur ne changeront pas ente le serveur de developpement et le serveur de produiction.

    - **Fichier app.php**:
        - `'name' => env('APP_NAME','Laravel')` : elle indique que si il y a une valeur **APP_NAME** qui est renseigner dans un fichier .env c'est cette valeur qui sera pris en compte et si il y a pas de valeur c'est la valeur **Laravel** qui sera pris en compte. 

        - `'debug' => env('APP_DEBUG', false)`: Par defaut lorsqu'on installe laravel, celui ci est en mode "debug". au niveau de l'affichage des erreurs, si on entre une URL qui n'est pas prévue on obtien `Sorry,the page you are looking for could not be found`
        En mode production, il faut changer ce mode et pour ce faire 
            - **NB**: Autrement dit, on va chercher la valeur dans l'environnement, à la variable `ENV_DEBUG` la valeur est `TRUE`. 
                - On la concerver telle qu'elle est lorsque on est en mode débogage avec affichage de messages d'erreur détaillés. 
                - Si on la passe a false on obiendra le message `Sorry,the page you are looking for could not be found` en cas d'erreur. 
                - **Il ne faut surtout pas laisse la valeur true  lors d'une mise en production afin de prevenir LARAVEL que l'on est en mode DEV ou PROD.**

        - `'timezone' => 'UTC'`: Elle permet de gerer le [timestamp](https://fr.wikipedia.org/wiki/Horodatage). 
        Càd lorsqu'il y a une heure qui est pris en compte il faut qu'il soit celui de la zone géographique souhaité.
            - Pour mettre la time zone correspondant au pays souhaité : [timezones.php](https://www.php.net/manual/fr/timezones.php)

        - `'locale' => 'en'` : Gestion des fichier de traduction
            - utile pour les messages d'erreur
            - **Nb** : par defaut, seule les fichier en anglais sont present. il faut donc telecharger soit meme les fichier pour la langue francaise ou autre.

        - `'fallback_locale' => 'en' ` si les fichier en francais ne sont pas trouvé il revient sur ceux en anglais.
--------------------------------------------------------------------------------
# Gestion de la base de donnée 
[Retour](#Formation-pour-débutant-LARAVEL)

### Les migrations 

- Les migrations sont comme un contrôle de version pour la base de données, elle permettent  de définir et de partager la définition du schéma de base de données de l'application. 
- La façade Laravel Schema fournit une prise en charge des bases de données pour la création et la manipulation de tableaux dans tous les systèmes de bases de données pris en charge par Laravel. 
- En général, les migrations utilisent cette façade pour créer et modifier les tables et les colonnes de la base de données.
- On utilise la commande **php artisan make:migration** pour générer une migration de base de données. 
La nouvelle migration sera placée dans le répertoire `database/migrations`. Chaque nom de fichier de migration contient un horodatage qui permet à Laravel de déterminer l'ordre des migrations :
    - `php artisan make:migration create_flights_table`
- Laravel utilisera le nom de la migration pour tenter de deviner le nom de la table et si la migration créera ou non une nouvelle table. 
Si Laravel est capable de déterminer le nom de la table à partir du nom de la migration, Laravel pré-remplit le fichier de migration généré avec la table spécifiée. 
Sinon, on peut simplement spécifier la table dans le fichier de migration manuellement.
    - Si on souhaite spécifier un chemin personnalisé pour la migration générée, on utilise l'option `--path` lorsque on exécute la commande `make:migration`. Le chemin donné doit être relatif au chemin de base de l'application.

[Retour](#Formation-pour-débutant-LARAVEL)

### Executer la migration
- Pour executer les migration en cours :
    - `php artisan migrate`
- Pour voir quelle migrations on été executées:
    - `php artisan migrate:status`
- Pour ajouter une nouvelle colone à une table existante: 
    - On va créer une nouvelle migration: 
        - `artisan make:migration add_NomDeLaColone_to_NomDeLaTable_table --table=NomDeLaTable` 
    - Dans la nouvelle classe créer: 
        - Rajout de la colonne souhaité et de son enplacement
        - Rajout de la fonction de suppression dropColumn('Nom de la colonne')
    - Dans la console: 
        - `php artisan migrate`

[Retour](#Formation-pour-débutant-LARAVEL)

### Gestion des migrations

- Dans la db il y a une table nommée **migration**:
    - Elle contient les migrations qui ont été faites et qui portent un numero **batch** établit en fonction de l'ordre que les migration ont ete faites.
    - elle permet de gerer les retour en arriere des migration qui ont ete faites. 
- Pour annuler la derniere migration
    - `php artisan migrate:rollback`
- Pour annuler toutes les migrations:
    - `php artisan migrate:reset`


[Retour](#Formation-pour-débutant-LARAVEL)

-------------------------------------------------------------------------------

### Creation des tables 

- [Table](https://laravel.com/docs/8.x/migrations#tables) 
- [Column](https://laravel.com/docs/8.x/migrations#columns)
- [indexes](https://laravel.com/docs/8.x/migrations#columns)

[Retour](#Formation-pour-débutant-LARAVEL)


-------------------------------------------------------------------------------
### Contrainte de clef etrangere 

- Ancienne syntaxe:
    ```
    Schema::table('posts', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id');

        $table->foreign('user_id')->references('id')->on('users');
    });

    ```
- Nouvelle syntaxe : 
    ```Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });
    ```
    - La méthode `foreignId` est un alias pour `unsignedBigInteger` tandis que la méthode `constrained` utilisera des conventions pour déterminer le nom de la table et de la colonne référencées. 
    Si le nom de la table ne correspond pas aux conventions de Laravel, On peut spécifier le nom de la table en le passant comme argument à la méthode constrained : 
    ```
        Schema::table('posts', function (Blueprint $table) {
        $table->foreignId('user_id')->constrained('users');
        });
    ```
    - On peut également spécifier l'action souhaitée pour les propriétés **on delete** et **on update** de la contrainte 
    ```
        $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
    ```
[Retour](#Formation-pour-débutant-LARAVEL)

-------------------------------------------------------------------------------
# SEEDING

[Retour](#Formation-pour-débutant-LARAVEL)

- Action qui consiste a remplir les tables avec du contenu qui va etre generer de maniere aleatoire.
    - Pour remplir les tables avec du contenu il faut: 
        - Créer un fichier de seeding
        - Crée un factory, qui va permettre comment est ce qu'on va remplir les tables et avec quel type de donnée.

**NB** : Le factory il va permettre de creer un model et les diffrent type de donner pour les champs des tables. et le seeder appele le factory et lui dit combien de fois il souhaite utiliser ce factory pour créer du resultat

## Factory et Faker 

[Retour](#Formation-pour-débutant-LARAVEL)

factory & [Faker](https://github.com/fzaninotto/Faker)

### Création du factory 
1. `php artisan make:factory NomModeleFactory --model=Post`
    - On indique le nom du modele suivit de Factory (par convention) et ensuite on rajoute une obtion indiquant le modele auquel est associer le factory.
2. **Dans le databse/factories**:
    - Un fichier NomModeleFactory est créer.
    - Il faut rensegner les differents champs(ceux qui ne se genere pas automatiquement ex : id...) que nous souhaitons remplir.
        - à l'aide [faker](https://github.com/fzaninotto/Faker). 
            -   ```
                
                    return[
                        'nom_champs'=>$faker->paragraph,
                        ...,
                    ]

                ```
[Retour](#Formation-pour-débutant-LARAVEL)


### Création du seeder: 
1. `php artisan make:seeder NomTableSeeder` (NomTables avec un "s" )
2. Dans le dossier **database\seeds**:
    - Dans le fichier crée: 
        - Dans la methode run():
            - On met le nombre de fois que l'on veut créer dans la table 
                - `factory(deux paramettre)->create();`
                    - parametre 1 (nom de la classe = App\Post::class)
                    - paramettre 2 le nombre souhaité
                    - `factory(App\Post::class,30)->create();`


3. Dans le fichier **DatabaseSeeder.php**:
    - Dans la methode run():
        - on indique les different seeder que l'on souhaite executer lorsqu'on appelera la commande correspondant avec artisan.
            - `$this->call(PostsTableSeeder::class);`
            - **NB: L'ordre est important** 



###### php artisan db:seed

- **NB**: si on souhaite seede une seule table dans la db (par ex si on a plusier table dans la fonction run de DatabateSeeder.php) :
`php artisan db:seed --class=PostsTableSeeder`


[Retour](#Formation-pour-débutant-LARAVEL)


--------------------------------------------------------------------------------

# Authentification sans jetstream 

[Retour](#Formation-pour-débutant-LARAVEL)

- Apres la creation et la migration des table user dans la AB
    - `composer require laravel/ui`
    - `php artisan ui bootstrap`
    - `php artisan ui bootstrap --auth`
    - `npm install && npm run dev`
- Configuration de bootstrap (si le bootstarp ne prend pas):
    - `npm install resolve-url-loader@^3.1.2 --save-dev --legacy-peer-deps`
    - `npm install && npm run dev`
- Redirection apres connection: 
    - `app\Http\Controllers\Auth\ConfirmPasswordController.php`
    - `app\Http\Controllers\Auth\LoginController.php`
    - `app\Http\Controllers\Auth\RegisterController.php`
    - `app\Http\Controllers\Auth\ResetpasswordController.php`
    - `app\Http\Controllers\Auth\VerificationController.php`


--------------------------------------------------------------------------------
# <div align="center"> Conception </div> 
--------------------------------------------------------------------------------
# Les Routes

[Retour](#Formation-pour-débutant-LARAVEL)

**Note**:
- Les routes = URI + Action 
    - **URI** : Le terme URI est l'acronyme de **Uniform Ressource Identifier**, qui signifie Identifiant de ressource uniforme. Ce terme désigne un élément permettant d'identifier une ressource. Par analogie, cela correspond à l'identité d'une personne.
    - Une **URL** est une information permettant de localiser un élément. Il s'agit de l'acronyme de **Uniform Ressource Locator**. L'adresse d'un site internet est une URL. Cela peut correspondre à une adresse postale comme 1 Rue de la mairie. 
    
    **NB:** Toutes les URL sont des URI, car il est par exemple possible d'identifier une personne avec son adresse, mais toutes les URI ne sont pas des URL. Le nom Marc Fort ne donne aucune information sur la localisation

    - **Action** : c'est la methode qui appartien a une classe controlleur.

### Emplacement des routes

- Toutes les routes sont contenus dans le fichier **routes/web.php** qui se trouve dans le dossier routes
- Ce fichier est accompgané d'autre fichier:
    - api.php
    - channels.php
    - console.php
    **NB:** *Ces fichier determinent aussi des routes mais qui ne sont pas disponible directement depuis le web. càd pas depuis notre site web. elle seront accessible depuis un terminal ou depuis une API si jamais notre site en est équipé*
- Ce fichier appartient a un [midleware](https://fr.wikipedia.org/wiki/Middleware) il permet de filtre les reques HTTP des visiteurs( la securité, gestion des session ....)

[Retour](#Formation-pour-débutant-LARAVEL)

## Methodes

- Les routes utilisent differente methodes :
    - **GET** : C'est pour la **lecture**, c'est avec cette methode qu'est appelé toutes les page par defaut.lorsqu'on demande à acceder a une page pour voir son contenu
    - **POST** : C'est pour la **création**. lorsqu'on creer des formulaire HTML on met souvant la methode post pour que les donnée soient envoyer dans le corps de la requete HTTP.
    Ici il sera utiliser pour creer des nouvelles source en BDD
    - **PUT (pas en HTML)** : Permet de faire une **mise à jour** sur les données
    - **DELETE(Pas en HTML)**: permet de supprimer la resource qu'on lui aura passée en parametre.

- Pour les methode PUT et DELETE, dans LARAVEL, on peut creer un formulaire en methode POST et dans le formulaireon vient mettre un champs caché (il y a une fonction que creer par laravel qui permet de le generer sans l'ecrire soit meme : `method_field('put')`) et on a juste à renseigner la methode que l'on souhaite ce qui permet de signifier la methode utiliser a Laravel
    -   ```   
            <form method="post" action=>
                <?php echo method_field('put); ?>
                <input ....>
            </form>
        ```
- Il y aussi un autre champs qui sera caché: le champs `csrf_field()`:
    - Il contine une suite de chaine de caractere totalement aleatoire qui est attribuer à l'utilisateur lorsqu'il arrive sur le site ce qui va lui permetre d'effecture seulement les les action qu'il souhaite effectuer
        - à chaque fois qu'un formulaire sera transmis au site, on verifiera ce champs pour voir si il correspond bien à la session que l'on a creer pour le visiteur.
**NB** : On utiser les 4 methodes et non juste les deux connus "POST et GET",par ce que du coup via le fichier du route on va pouvoir renseigner pour une meme URI 4 route differentes qui auront la meme URI. Ainsi, en fonction de la methode appelé, ca ne sera pas la meme route qui sera appelé.
- ex: 
    - Si on appele Get Post1 : on va recuperer le post1
    - Si on appele Delet Post1 : on va supprimer la ressource post1
    - Si on appeele Put Post1 : c'est qu'on souhaite mettre à jour post1



### Concretement : 
- dans le fichier **route\web.php**
    -   ```
            Route::get('URI',Action(){
                return view('la vue')
            })
        '/' => juste le nom de domaine 
        function() =>  fonction annonyme qui returne une vue 
        ```
    - L'action va soit returner une vue, page...., soit une redirection

[Retour](#Formation-pour-débutant-LARAVEL)


## Creation route

1. `Route::get('hello',function(){return ....});`
    - :: parce que c'est une appele statique
2. Lui donner un nom pour pouvoir y acceder beaucoup plus facilement
    - name('le nom');
        - `Route::get('hello',function(){return ....})->name('nom de la route');`
3. si besoin, il y une possiblité de rajoute de paramettre variables(un identifant, ou le titre d'un article qui se trouve dans la DB): 
    - On y rajouter des **paramettre obligatoires** qu'on va renseigné à l'aide d'accolades `{nom_du_paramettre_variable}` qu'on va recupere via la fonction anonyme pour le passer au corps de l'action
        - Dans le parametre de la fonction anonyme où chaque paramettre est recuperer dans l'ordre dans lequel il a ete mis. (donc on peut mettre n'importe quel appellation dans les argument des la `fonction($blabla)
        ` et dans le return on rapelle l'argument )
    -   ```
           Route::get('helo/{name}', function($name){
               return "ce que l'on veut $name"
           }) 
        ```
    - Nb : c'est paramettre obligatoire car si on ne met pas l'argument dans l'url la page sera une erreur 404
    - Ou des **paramettre Optionnelles** :
        - On y rajout un "?" 
        - et comme c'est paramettre optionnel il faut renseigner une valeur par defaut 
            -   ```
                    Route::get('helo/{name?}', function($name='valeur_par_defaut){
                        return "ce que l'on veut $name"
                    }) 
                ```

### Commande pour liste les route 

- ###### php artisan route:list
    - Commande pour mettre en cache les differentes routes (ce qui permet aux route de charger plus rapidement à l'aide laravel) parcontre une fois fais il faudra le faire à chaque fois sinon les modification ne seront pas pris en compte : 

- ###### php artisan route:cache (à faire avant la production)
- ###### php artisan route: clear (pour supprimer les route dans le cache)

[Retour](#Formation-pour-débutant-LARAVEL)


## Injection de dépendance
- ca permet d'injecter des objects au niveau de l'action et de pouvoir les utiliser dans le corps de l'action.
    - si on veut recupere le contenu d'une post, on peut renseigner le type du contenu que l'on veut recupere 
        -   ```
                Route::get('posts/{identifiant_du_post_en_BDD}', function(App\Post = "du modele post" $post){
                    return $post["titre"]
                }) 
            ```
[Retour](#Formation-pour-débutant-LARAVEL)

-------------------------------------------------------------------------------


# Les Controleurs 


[Retour](#Formation-pour-débutant-LARAVEL)

### Emplacement des controleurs 
-  Dans le dossier **app/http/controllers**:
    - C'est une classe qui de preference portera le nom du modele auquel le controleur fait reference suivit du mot clef controller. il va ensuite etendre la classe controlleur ce qui va permettre d'acceder à un certain nombre de fonctionalité
    - Il va contenir des methodes :
        - index() : Permet de retourner une vue
        - supprimer(): redirige les visiteur vers une autre route
    - **Note :** 

    ```
        Class PostController extends Controller ====> Controleur(app/http/controllers)
        {
            public function index() =====> C'est une action, un méthode ou un controleur, on l'appelle comme on veut
                                            Route::get('posts','PostController@index')->name(posts.index) 
            {
                return view('posts.index'); =====> return une vue
            }
            public function supprimer(Post $post) =====> injection de dépendance
                                            Route::delete('posts/{post}','PostController@supprimer');
            {
                return redirect()->route('post.index'); =====> on redirige le visiteur vers une autre route
            }
        
        }
    ```
[Retour](#Formation-pour-débutant-LARAVEL)

##### Création controlleur 

- Genereation du fichier controleur:  
    - `php artisan make:controller NomControleur`
        - Pour la convention de nomage (Nomcontrolleur), Si le controleur ne gere qu'une seule ressource, on met son nom de modele et ensuite le nom du controleur 
    - Voir dans dossier **app\http\controllers**:
        - Création des méthodes souhaité:
            - Si c'est une methode qui appele une ragument, Pas oublier de rappeler le sapceName du modele que l'on souhaite appele l'argument.
    - Dans le routeur: 
        - `Route::get('URL/{dependance}',NomControlleur@methode')->name('NomRouteur')`
            - Dans le cas d'injection de dependance, Le **nom du paramettre** qui se trouve dans les accolades doit absolument corespondre au **nom donnée à la variable** qui se trouve dans la methode: 
                -   ```
                        // Dans le controlleur 
                        use App\Post;
                        class PostController extends Controller
                        {
                            public function getPost(Post $post)
                            {
                                return $post["title];
                            }
                        }

                        // Dans le routeur
                        Route::get('URI/{post}', PostController@getPost')->name('...');
                    ```  
[Retour](#Formation-pour-débutant-LARAVEL)

#### Generation avec option resource

- ressource permet de generer directement un certains nombre de methodes qui vont permettre d'avoir tout ce qu'il faut pour gere une ressource en particulier. 
    - `php artisan make:controller NomController --resource`
        - **Elle genere automatiquement, dans le controlleur, differentes methodes** 
            - index(): Qui afficher un listing de toutes les ressources
                - Ex : une table rempli de post,c'est via cette methode qu'on pourra afficher tout les posts
            - create(): Qui permet de crée une nouvelle ressource,
                - Ex : un nouveau post
                - Nb : c'est le formulaire de creation 
            - store(): Qui permet de stocker la ressource en BDD
            - show(): Qui permet de voir une resource en particulier, 
                - Ex: un post en particulier
            - edit(): Qui permet d'avoir le formulaire d'edition
            - update(): Qui permet de mettre à jour via le formulaire d'edition
            - destroy(): Qui permet de detruire la ressource

    - `php artisan make:controller NomController --resource --model=Nom_du_model`
        - **Elle genere automatiquement, dans le controlleur, differentes methodes mais elle genere aussi les injections de dependance et le name space est directement mis en place aussi** 

- **L'interet tres important d'utillisation de resource c'est que, au niveau des routes, on va pouvoir utiliser une methode qui va permettre en une seule ligne de creer toutes les routes qui vont correspondre aux differentes methodes**
    - `Route:: resource('Base_de_URI','Nom_du_Controlleur')`
        - La Base_de_URI va etre deriver en plusieur URI pour toutes les routes qu'on a, en generale on met les nom de l'URL au pluriel,
        - Le Nom_du_controlleur : c'est sans preciser la méthode car c'est toutes les methodes qui vont etre utliser pour créer les differentes routes 
    - Si on veut que un certain nombre de route
        - On peut indiquer les routes que l'on souhaite generer **only('NomMethode')**:
            - `Route::resource('Base_de_URI','Nom_du_Controlleur')->only(['NomMethode1','NomMethode2',...]);`
        - On peut indiquer les routes que l'on veut enlever du listing **except('NomMethode')**
            - `Route::resource('Base_de_URI','Nom_du_Controlleur')->except(['...','...']);`

[Retour](#Formation-pour-débutant-LARAVEL)

#### Changement nomination URL
    - Dans le dossier **app\providers**
        - AppServiceProvider.php:
            - Importer la classe route:
                - `use Illuminate\support\facades\Route;`
            - Dans la methode **boot()** :
                -   ```
                        Route:: resourceVerbs([
                            'create' => 'creer',
                            ...
                        ])
                    ```
[Retour](#Formation-pour-débutant-LARAVEL)

-------------------------------------------------------------------------------

# Liaison route et controlleur 

[Retour](#Formation-pour-débutant-LARAVEL)

### Remplacement de la fonction anonyme par l'action d'un controlleur: 

- `Route::get('URI','Nom_Controleur@Nom_methode')->name(URI.Nom_methode)`
- `Route::delete('URI/{...}','Nom_Controleur@Nom_methode')->name(URI.Nom_methode)`
- **Voir aussi generation route avec l'otpion d'artisan resource** 



--------------------------------------------------------------------------------

# Les Modeles

[Retour](#Formation-pour-débutant-LARAVEL)

### L'ORM [Eloquent](https://laravel.com/docs/master/eloquent) (Objet Relational Mapping)

- Pour communique avec la base de donnée on va utiliser les models placés entre les tables de la base de donnée et le script. 
Laravel offre [Eloquent](https://laravel.com/docs/master/eloquent) un ORM (object relational mapping) qui facilite la manoeuvre. 
- **Chaque tables de la base de donnée à son propre modele**
    - On utilisa la classe pour avoir la communication avec la table

#### Creation modele
- Le modele doit porter le meme nom que la table, doit etre au **singulier**(Laravel rejoutera par defaut un "s" du pluriel) et doit commencer par une **lettre majuscule**
    - `php artisan make:model NomDuModel`
    - On peut aussi utiliser l'option `-m`(m represente le make:migration) qui va permet de creer des fichier de migration simultanement
        - `php artisan make:model NomDuModel -m`
- Dans le dossier `app` à sa racine il y aura un fichier `NomDuModel.php`, qui va se créer:
    - il contine la classe nommée **NomDuModele** et qui communique via sont extention à Model de communiquer avecune table qui porte le NomDuModel
- Dans le dossier `Database\migration` : 
    - Il contient le fichier de creation de la table.  
- **NB** : si la classe de l'objet créer ne correspond pas à la table en BDD,:
    - `class ... extends Model { protected $table = 'NomDeLaTableEnBDD'}` 
- On complete la table comme on le souhaite
- On fait la migration:
    - `php artisan migrate`
- **NB** : Il y a toujours une model users qui est créer par defaut et qui permettre de gerer les manipulation de la tabme users

[Retour](#Formation-pour-débutant-LARAVEL)

### Les relations 

[ELOQUENT:Relationships](https://laravel.com/docs/8.x/eloquent-relationships)

[One To One](https://laravel.com/docs/8.x/eloquent-relationships#one-to-one)
[One To Many](https://laravel.com/docs/8.x/eloquent-relationships#one-to-many)
[One To Many (Inverse) / Belongs To](https://laravel.com/docs/8.x/eloquent-relationships#one-to-many-inverse)
[Has One Through](https://laravel.com/docs/8.x/eloquent-relationships#has-one-through)
[Has Many Through](https://laravel.com/docs/8.x/eloquent-relationships#has-many-through)


-------------------------------------------------------------------------------

# Les middlewares 

[Retour](#Formation-pour-débutant-LARAVEL)

- Les middleware permet de filtrer les requettes http des visiteurs, elle permet donc d'ajouter certaines fonctionalité, notamment à proteger de la faille [CSRF](https://fr.wikipedia.org/wiki/Cross-site_request_forgery#:~:text=En%20s%C3%A9curit%C3%A9%20des%20syst%C3%A8mes%20d,des%20services%20d'authentification%20web.) Pour le groupe des middleware web. 
- Partant d'elle, on va puvoir soit exiger d'une requette qu'elle est des securité comme un champs [csrf](https://fr.wikipedia.org/wiki/Cross-site_request_forgery#:~:text=En%20s%C3%A9curit%C3%A9%20des%20syst%C3%A8mes%20d,des%20services%20d'authentification%20web.) dna sles formulaire. c'est le cas du groupe des middleware web qui demander une protection de la faille csrf et qui egalement rajoute des fonctionnalités comme la gestion des session, le criptage des coockies etc ...

## Deux middleware Auth et Guest 


1. **AUTH()**: Qui permet de controler l'acces au site pour les membre qui sont authentifiés. autrement dit, si un membre est authentifié il passera le middleware auth sans aucun soucis, et dansle cas contraire, il aura un message d'erreur.
2. **GUEST()**: Qui fait le contraire du middleware AUTH. càd si l'utilisateur n'est pas authentifié, c'est bon. et dans les cas contraire il y a une message d'erreur. 
    - Il est interessant dans le cas d'un formulaire de connection pour le quel on souhaite qu'il soit accessible aux gens qui ne sont pas connectés et nom pas à ceux qui sont deja connectés. 

[Retour](#Formation-pour-débutant-LARAVEL)

## Creation de middleware 
- Soit au niveau des routes : 
    - Accessible seulement aux membre authentifiés 
        - `Route::get('URI/{dependance}','NomMeodelControleur@Méthode')->name('NomRoute')->middleware('auth');`
    - Accessible seulement aux membre qui ne sont pas authentifiés 
        - `Route::get('URI/{dependance}','NomMeodelControleur@Méthode')->name('NomRoute')->middleware('guest');`
- Soit au niveau des controlleur (recommandé):
    - Dans le controleur du modele: 
        - Création d'un constructeur:
            -   ```
                     Public function __construct(){
                        $this->middleware('auth ou guest');
                        si besoin : ->except('');
                                    ->only(''); // pas besoin de mettre sous forme de tableau "[]" si plusieurs argument
                        }
                ```
[Retour](#Formation-pour-débutant-LARAVEL)

--------------------------------------------------------------------------------
# Les vues 

[Retour](#Formation-pour-débutant-LARAVEL)

- Elle sont stocker dans le Dossier **resources\views**
    - Il est recommandé d'organiser les vues avec des sous-dossier pour ne pas avoir toutes les vues à la racine du dossier views. 
        - Ex : Pour une vue qui serait lié aux poste et contenant une vue qui se nome index.php 
            - `resources/views/posts/index.php`
- Elle contiennent du HTML de base avec du php.
- **Pour retourner la vue aux visiteurs:**
    - Faire une **return** avec la fonction **view** dans le **controlleur**
        - `return view('posts.index');`
            - Pour l'**argument** de cette **fonction view**,on renseigne le **nom** de la vue que l'on veut retourner aux visiteurs
                - Il n'est pas necesaire de spécifier l'**extension du fichier** 
                - Pour les sous dossier, on les separe  avec des "**.**" (Cela permet à Laravel de determiner où se trouve la vue)
    - La **fonction view** : permet aussi la transmission des données à la vue:
        - Toutes les donnée recuperé depuis le controlleur et qui sont contenues dans nos tables, elle ne vont pas etre transmis automatiquement à la vue, le controleur et la vue n'etant pas dans le meme environnement, il n'est pas possible d'accéder à ces données sans rien faire. 
            - Pour ce faire, on transmet en **deuxieme paramettre de la fonction views()**, un **tableau** qui contiendra les données recuperé directement depuis le controlleur.
                - `return view('posts.index',['posts' => $posts]);`
### Generer une vue 
- Dans le dossier **app/http/controllers**
    - Dans le fichier du controleur: 
        - Il y a une méthode **show()** qui permet d'afficher une resource spécifique par rapport à ce qui est transmis dans ses arguments.

    - Etant donné que à la création du controlleur on a indiqué le modele, on a directement aussi la variable (**ID**) correspondant à la barre d'adresse qui a ete injecté.
        - La valeur recuperé grace à l'**id** qui est dans l'URL va etre transmis a la vue.
            -   ```
                    public function show(Post $post)
                    {
                        return view('dossie.vue',['post'=> $post])
                    }
                ```
- Dans le dossier **resource/views**:
    - Création de du dossier contenant la vue et ensuite le fichier des la vue (avec l'extension **[blade](https://laravel.com/docs/8.x/blade).php**) voir pourquoi dans la section **blade**
- Dans le ficher de la vue:
    - Laravel va creer une variable qui porte le meme nom que la clef, de ['clef' => valeur], de la fonction show() du controleur. 
    - Pour la recuperation et donc l'affichage dans le vue 
        - `<?php echo $post->titre ou alors $post["titre"] (si on souhaite affiche les titre de la table correspondant)  ?>`

[Retour](#Formation-pour-débutant-LARAVEL)

-------------------------------------------------------------------------------

# BLADE

[Retour](#Formation-pour-débutant-LARAVEL)

- [Documentation blade](https://laravel.com/docs/8.x/blade)

- C'est un moteur de tamplate php
    - Il permet de compiler du code
        - il va compiler tous les fichier qui portent l'extention **.blade.php**
    - L'interet est que les vues ne vont plus contenir du php.
- Le code blade :
    -   ```
            @if (macondition)
                {{...}}
            @endif
        ```
    - La plus par des directives (comme par exemple : les conditions, les boucles, ...)vont prendre un **"@"** au debut ceci afin que blade les repere et ensuite les modifier en php. 
    - Pour faire les **echo** des differentes données des tables en BDD, on utilise les doubles accolades **"{{}}"** 
        - L'interet ce que elle viennent faire l'echo de la variable qui se trouve à l'interieur mais en plus de ca, elle viennent appliquer à tout ce qui se trouvent à l'interieur la fonction [htmlspecialchars()](https://www.php.net/manual/fr/function.htmlspecialchars.php)
            -  Cette fonction permet de se premunir de la faille [XSS](https://fr.wikipedia.org/wiki/Cross-site_scripting) 
- Le code en php:
    -   ```
            <?php if(condition): ?>
                <?php echo htmlspecialchars(...);?>
            <?php endif; ?>
        ```
- Lorsque les fichier sont compilés , il sont mis dans le dossier **storage/framework/views**
- Dans le fichier de la vue: 
    - `{{$post->titre}}`
- Les fichier **style css et js** se trouvent dans le dossier **public**. 

### Etendre une contenu d'un fihier à l'autre

- **Dans le fichier de depart**. 
    - @extends('NomdossierDeDestination.NomFichierDeDestination')
    - @section('NomSection')
        - contenu de la section
    - @endsection
- **Dans le fichier de destination** 
    - @yield('NomSection')




---
# Layout global


[Retour](#Formation-pour-débutant-LARAVEL)

### Les formulaires

1. 1 **Formulaire d'inscription Methode POST**.
    - Il se trouve dans le dossier **view/auth** Dossier créer par laravel avec la commande `make:auth`;
        - `register.blade.php`
    - exemple :     
        ```
            @extends('DossierLayoutGobale.FichierLayoutGlobal')
                @section('NomSection')
                    <main class="container auth">
                        <div class="message error">
                            Erreur sur le nom 
                        </div>
                        <div class="message error">
                            Erreur sur le mail 
                        </div>
                        <div class="message error">
                            Erreur sur le mot de pass 
                        </div>
                        <form method="POST" action="{{ route('register')}}">
                        // Champs CSRF 
                        csrf
                        // Champs methode PUT qui n'est pas utilisé
                            <input type="email" name="email" palceholder="Adresse email" value="">
                            <input type="text" name="name" palceholder="Nom" value="">
                            <input type="password" name="password" palceholder="Mot de pass" value="">
                            <input type="password" name="password_confirmation" palceholder="Confirmez le mot de pass" value="">
                            <input type="submit" value="inscription">
                        </form>
                    </main>
                @endsection('NomSection')

        ```
        - Ce formuliare contient: 
            - Les messages de gestion de message d'erreur.
            - Un champs CSRF :
                - `@csrf`
            - Action :
                - `{{ route('register')}}` : en fonction de l'action que l'on veut appeler. ici c'est register
1. 2 **Formulaire de mise à jour Methode : PUT**.
    - Lorsque l'on doit ou on veut utiliser une methode HTTP differente de get ou post 
        - On indique un champs caché qui va contenir **PUT** ou **DELETE**
            - On Utilise la directice blade : **method('PUT ou DELETE')** on lui passe en paramettre le nom de la requette HTTP que l'on souhaite executer.
        - Pour la mise à jour on utilise la methode **PUT**
    - exemple : 
        ```
            @extends('DossierLayoutGobale.FichierLayoutGlobal')
                @section('NomSection')
                    <form method="POST" action="{{ route('NomRoute')}}">
                                    // Champs CSRF 
                                    csrf
                                    // Champs methode PUT 
                                    @methode('PUT')
                                        <input type="password_old" name="password" palceholder=" Ancien mot de pass" value="">
                                        <input type="password" name="password" palceholder="Nouveau mot de pass" value="">
                                        <input type="password" name="password_confirmation" palceholder="Confirmez le mot de pass" value="">
                                        <input type="submit" value="Modifier">
                                    </form>
                                </main>
                @endsection('NomSection')

        ```
1. 2 **Formulaire de connection** .
    - exemple :
        ```
            @extends('DossierLayoutGobale.FichierLayoutGlobal')
                @section('NomSection')
                    <form method="POST" action="{{ route('NomRoute')}}">
                                    // Champs CSRF 
                                    csrf
                                        <input type="mail" name="mail" palceholder="Adresse mail" value="">
                                        <input type="password" name="password" palceholder="Mot de pass" value="">
                                        <div class="checkbox" name="remember">
                                            Rester connecter
                                        </div>
                                        <input type="submit" value="Modifier">
                                    </form>
                                    <a href="{{route('password.request')}}"> Mot de passe oublié </a>
                                </main>
                @endsection('NomSection')

        ```
    - Pas de champs @methode() utilisé
    - Mise en place du champs "Mot de passe oublier".

[Retour](#Formation-pour-débutant-LARAVEL)

### Lier le contenu de la layout globale aux css et js

- Dans le **head** du HTML du fichier contenant le layout global `resource/views/layouts/app.blade.php`
    - Liens CDN : `link rel="..." hrel="CDN" ...`
    - Pour les liens vers les documents css de public: 
        -  Utilisation du code propre à blade:
            - `<link rel="stylesheet" href="{{ asset('Css/FichierCss') }}">`
            - {{}} : affichage d'un flux au niveau du document html
            - asset(): inclure une resource qui se trouve dans le dossier public
                -  en paramettre on precise la ressource que l'on souhaite inserer et on prend comme base le dossier public (on note directement les dossier interne a public sans mettre public ex:Css/style.css)
- Dans le body du HTML du fichier contenant le layout global `resource/views/layouts/app.blade.php`
    - Pour les liens vers les document js
        - Utilisation du code propre à blade: 
            - `<script src="{{asste('Js/fichierJs')}}"></script>`

[Retour](#Formation-pour-débutant-LARAVEL)

3. **Directives blade permettant de voir si le visiteur est connecter ou pas**
    - [Documentation blade (authenication directives)](https://laravel.com/docs/8.x/blade#authentication-directives) 
         
        - Sans la condition     
        ```
            @guest
            // Contenu visible si on est pas connecté
            @endguest
            @auth
            // Cotenu visible si on est connecté
            @endauth
        ```
        - Avec une condition 
        ```
            @guest
            // Contenu visible si on est pas connecté
            @else
            // Cotenu visible si on est connecté
            @endauth
        ```
4. **Champs CSRF**
    - `@csrf`
5. **Traitement des liens "href" vers les routes**
    - Fontion **route('Nom_de_le_route_du_lien')**
        - `href="{{ route('Dossier.fichier')}}"`
6. **Pour recuperere le nom, l'adresse, ... d'un ustilisateur qui se connecte**:
    - `{{Auth::user()->name}}`

-------------------------------------------------------------------------------
# JETSTREAM

[Retour](#Formation-pour-débutant-LARAVEL)

[Documentation jetstream](https://jetstream.laravel.com/2.x/introduction.html)



- Laravel Jetstream est un kit de démarrage d'application parfaitement conçu pour Laravel et qui fournit le point de départ parfait pour une application Laravel.
- Il fournit la mise en œuvre pour **la connexion**, **l'enregistrement**, **la vérification de l'email**, **l'authentification à deux facteurs**, **la gestion des sessions**, **l'API via Laravel [Sanctum](https://github.com/laravel/sanctum)**, et les fonctionnalités optionnelles de gestion d'équipe.
- Il a ete conçu à l'aide de [TailwindCSS](https://tailwindcss.com/)
- Il offre le choix entre deux stacks front-end : [Livewire](https://laravel-livewire.com/) et [Inertia.js](https://inertiajs.com/). Chaque stack offre un point de départ productif et puissant pour la construction de l'application ; cependant, suivant le stack choisis, dépendra de votre langage de templating. 
    - **[Livewire](https://laravel-livewire.com/) + [Blade](https://laravel.com/docs/8.x/blade)**:
        - Laravel Livewire est une bibliothèque qui facilite la création d'interfaces réactives et dynamiques en utilisant **Laravel Blade** comme langage de modélisation. Il s'agit d'un excellente stack à choisir si on souhaite construire une application dynamique et réactive et que l'on ne se sent pas à l'aise avec un framework JavaScript complet comme **Vue.js**.
        Lorsque on utilise Livewire, on peut choisir quelles parties de l'application seront un composant Livewire, tandis que le reste de l'application peut être rendu comme les modèles traditionnels Blade auxquels on est habitué.

    - **[Inertia](https://inertiajs.com/) + [Vue.js](https://vuejs.org/)**
        - Inertia est une bibliothèque qui permet de rendre des composants Vue à fichier unique à partir d'un backend Laravel, en fournissant le nom du composant et les données qui doivent être introduites dans les "props" de ce composant. 
        - Inertia utilise **Vue.js** comme langage de templating. 
        - La construction d'une application Inertia ressemble beaucoup à celle d'une application Vue typique, mais on utilisera le **routeur de Laravel** au lieu du **routeur Vue**. 
        - En d'autres termes, cette stack offre toute la puissance de Vue.js sans la complexité du routage côté client. On peut utiliser les approches standard de routage et de l'introduction des données de vue de Laravel auxquelles on est habitué.
        - La stack Inertia est un excellent choix si on est à l'aise avec Vue.js comme langage de templating.

### [Installation](https://jetstream.laravel.com/2.x/installation.html) 

[Retour](#Formation-pour-débutant-LARAVEL)

- On peu utiliser Composer pour installer Jestream dans un projet LARAVEL:
    - `composer require laravel/jetstream`
- Apres l'installation des package, on choisis les satck que l'on souhaite utiliser : 
    - Livewire:
        - `php artisan jetstream:install livewire`
    - Inertia:
        - `php artisan jetstream:install inertia`
- Apres l'installation de jetstream, on peut installer et construire les dépendances NPM et migrer les base de données:
    
    ``` 
        npm install 
        npm run dev 
        php artisan migrate 
    ```

- ##### Le logo: 

[Retour](#Formation-pour-débutant-LARAVEL)

    - Apres l'installation il y a le logo de jetstream qui est mis par defaut. il est possible de le modifier via deux composants de jetstream 
        - Avec **livewire**: 
            - Il faut tout d'abord publier le composant blade de livewire:
                - ` php artisan vendor:publish --tag=jetstream-views`
            - Et ensuite modifier le SVG situé dans : 

                ```
                resources/views/vendor/jetstream/components/application-logo.blade.php,
                resources/views/vendor/jetstream/components/authentication-card-logo.blade.php, 
                resources/views/vendor/jetstream/components/application-mark.blade.php components.
                
                ```
        - Avec **Inertia**:
            - Modifier le SVG situé dans :

                ```
                resources/js/Jetstream/AuthenticationCardLogo.vue, 
                resources/js/Jetstream/ApplicationLogo.vue, 
                resources/js/Jetstream/ApplicationMark.vue.

                ```
    - Apres la modification des composants reconstruire les etats 
        - `npm run dev`

## Architecture de Jetstream: 

[Retour](#Formation-pour-débutant-LARAVEL)

1. **Fortify** :
    - Fortify enregistre les routes et les contrôleurs nécessaires pour mettre en œuvre toutes les fonctionnalités d'authentification de Laravel, y compris **la connexion**, **l'enregistrement**, la **réinitialisation du mot de passe**, la **vérification de l'email**, et plus encore.
    - Après son installation, on peut exécuter la commande `route:list` Artisan pour voir les routes que Fortify a enregistrées. 
    - **Configuration de fortify**:
        - Lorsque Jetstream est installé, un fichier de configuration `config/fortify.php` est installé dans l'application. 
        Dans ce fichier de configuration, on peut personnaliser divers aspects du comportement de Fortify, comme **le garde d'authentification à utiliser, l'endroit où les utilisateurs doivent être redirigés après l'authentification, etc**.
        Dans le fichier de configuration de Fortify, on peut également désactiver des fonctions entières de Fortify, comme la possibilité de mettre à jour les informations de profil ou les mots de passe.
2. **Action**:
    - Laravel Jetstream ne publie pas de contrôleurs ou de routes dans l'application.
    Au lieu de cela, la fonctionnalité de Jetstream est personnalisée via **des classes "Action"**. 
    Pendant le processus d'installation de Jetstream, les actions sont publiées dans le répertoire `app/Actions` de l'application.
    Les classes d'action exécutent généralement une seule action et correspondent à une seule fonctionnalité de Jetstream ou de Fortify, **comme la création d'une équipe ou la suppression d'un utilisateur**. 
    On est libre de personnaliser ces classes si on souhaite modifier le comportement de Jetstream en backend. 
    Chacune des actions pertinentes publiées par Jetstream sera discutée dans la documentation correspondante de la fonction.
3. **Views / Pages**:
    - A l'installation, Jetstream publiera une variété de vues et de classes dans l'application. 
    Si on utilise **Livewire**, les vues seront publiées dans le répertoire `resources/views`` de l'application. 
    Si on utilise **Inertia**, les "Pages" seront publiées dans le répertoire `resources/js/Pages` de l'application.
    Les vues / pages publiées par Jetstream contiennent toutes les fonctionnalités supportées par Jetstream et on est libre de les personnaliser selon nos besoins. 
4. **Layout** (mise en page):
    - Après l'installation, l'application Jetstream contient deux "layouts". 
    D'abord, Jetstream crée une mise en page d'application qui est utilisée pour définir la mise en page des pages de l'application qui nécessitent une authentification, comme le tableau de bord de l'application. 
    Lorsque on utilise **Livewire**, cette mise en page est définie dans le fichier `resources/views/layouts/app.blade.php` et rendue par la classe `AppView\Components\AppLayout`. 
    Si on utilise **Inertia**, cette disposition est définie dans `resources/js/Layouts/AppLayout.vue`.
        - **NB**:
            - En plus du layout de l'application, Jetstream crée un layout **"invité"** qui est utilisé pour définir le layout des pages d'**authentification** de Jetstream, telles que les pages de connexion, d'enregistrement et de réinitialisation du mot de passe de l'application. 
            Lors de l'utilisation de **Livewire**, cette mise en page est définie dans `resources/views/layouts/guest.blade.php` et rendue par la classe `App\View\Components\GuestLayout`.
            Lors de l'utilisation de **Inertia**, cette mise en page est définie dans le fichier `resources/js/Layouts/GuestLayout.vue`.
5. **Dashboard**:
    - La vue "principale" de l'application est publiée à l'adresse
        - lorsque on utilise **Livewire** : `resources/views/dashboard.blade.php` 
        - lorsque on utilise **Inertia** :`resources/js/Pages/Dashboard.vue`  
    - On est libre de l'utiliser comme point de départ pour construire le "tableau de bord" principal de l'application.
6. **Composant livewire**:
    - En utilisant Livewire, Jetstream utilise une variété de composants génériques Blade tels que des **boutons et des modales**. 
    Si on souhaite publier ces composants après avoir installé Jetstream, on peut utiliser la commande vendor:publish Artisan :
        - `php artisan vendor:publish --tag=jetstream-views`
    - Une fois ces composants publiés, on est libre de les modifier si nécessaire pour ajuster l'aspect et la convivialité de l'application.
7. **Tailwind**:
    - Durant l'installation, Jetstream va échafauder l'intégration de l'application avec le **framework CSS Tailwind**. 
    Plus précisément, un fichier `webpack.mix.js` et un fichier `tailwind.config.js` seront créés. 
    Ces deux fichiers sont utilisés pour construire la sortie CSS compilée de l'application. 
    On est libre de modifier ces fichiers en fonction des besoins de l'application.
    De plus, le fichier `tailwind.config.js` a été pré-configuré pour supporter **PurgeCSS** avec les répertoires appropriés correctement spécifiés en fonction du stack Jetstream choisie.
    Le fichier `package.json` de l'application est déjà échafaudé avec des commandes **NPM** que on peut utiliser pour compiler les actifs. 

### Création de votre application 

- [Laravel Jetstream](https://jetstream.laravel.com/2.x/building-your-app.html)


[Retour](#Formation-pour-débutant-LARAVEL)
---

# Recupération des entre qui sont dans les tables
- Utilisation de L'ORM eloquente avec les modeles crée. 
- Utilisation de **query builder**

NB: avec laravel on ne fait pas directement des query sql pour recuperer des entrée en BDD comme on le fait habituellement avec PDO.
on a des methodes qu'il faut faut utiliser sur les model et qui vont permettre de recuperer indirectement les donnée qui sont dans les tables.
### Methode eloquante
1. se rendre dans le controleur : 
    - Dans la fonction **public function index()**:
        - il y a pas d'injection de dependance, donc pour selectionner les elements dans la table, il va faloir que l'on le fasse nous meme. 
            - On cree une variable
            - On Utilise le modele de souhaité 
                - **Normalement lors de la creation du model il est importé autmatiquement dans le controleur** sinon voir ``use App\Post`` 
        - **Selection de toutes les données d'une colonne :**
            - On fait un appel statique sur la methode **all()**
                - La methode **all()** permet de selectionner toute les données qui correspondent à la table du model. 
                    - Dans la variable on aura toute les entrées de la table concernée. 
            - On transmet les donnée à une vue 
                - return view('nom_de_la_vue', [passer les post : 'post'=> $posts]);
            -   ``` classe PostController extends Controller
                    {
                        public function index(){
                            $posts = Post::all();
                            return view('post.index',['post'=>$posts]);
                        }
                    }
                ```
        - **Selection d'une seule donnée :**
            - On fait un appel statique sur la methode **find()**
                - La méthode find prend en parametre **l'identifiant** de la resource à laquelle on veut acceder ou alors un tableau avec plusieurs identifant
                -   ``` classe PostController extends Controller
                    {
                        public function index(){
                            $posts = Post::find([,...,...]);
                            return view('post.index',['post'=>$posts]);
                        }
                    }
                    ```
                - **NB:** Il y a une variante de la fonction find qui permet de reoriente l'utilisateur si ca reque ne se trouve pas dans la table :
                    - **findOrFail()** elle renvois une erreur 404

2. au niveau de la vue:  
- on a acces à tous les posts definis dans le controleur en rapport 
    - On fait un doc HTML basique. 
    - Pour recuperer toute la selection. 
        - on peut faire un foreach pour afficher tous les titre des postes, ...
            -   ```
                    <body>
                    @foreach($post as post)
                        {{ $posts ->titre}}
                    @endforeach
                    </body>
                ```
    - Pour recupere un seule element 
        - pas de boucle forach:
            -   ```
                    <body>
                        {{ $posts ->titre}}
                    </body>
                ``` 
### Methode query builder
- [Documentation](https://laravel.com/docs/8.x/queries)
- Elle permet de chaine plusieurs methode pour contruire des requetes **SQL**
- Pour la clause **where**
    - Utilisation de la methode **get()**: permettant de recupere pour les resultats qui correspondent à la requete SQL 
    - Utlisation de la méthode **first()**: permettant de recuperer seulement le premier resultats qui correspond à la requete SQL
    -   ``` classe PostController extends Controller
                    {
                        public function index(){
                            $posts = Post::where('id','>=',20)->get();
                            return view('post.index',['post'=>$posts]);
                        }
                    }
        ```
- Pour enchaine deux clause **orderBy** et **where**
    -   ``` classe PostController extends Controller
                    {
                        public function index(){
                            $posts = Post::where('id','>=',20)->orderBy('id','desc')->get();
                            return view('post.index',['post'=>$posts]);
                        }
                    }
        ```
### Dans la vue :
 -  ```
        <body>
        @foreach($post as post)
            {{ $posts ->titre}}
        @endforeach
        </body>
    ```

-------------------------------------------------------------------------------
# LES FORMULAIRES 

- Dans le controlleur: 
    - La methode create sera charger de montrer le formulaire pour creer une nouvelle resource.
     1. returner une vue: 
        -   ```
                public function create()
                {
                    return view('post.create');
                }
            ```
- Dans les view:
    - Dans le dosier post:
        - creation de la vue **create.blade.php**
        - HTML basique 
        - Creation du formulaire
            - On appelle la methode **store** qui est dans le controleur.
                - C'est cette methode qui va etre charger de valider, de stoquer les donnée du formulaire et ensuite de rediriger vers une autre page.
                - On peut aussi rajouter **novalidate** pour indique que l'on ne veut pas fair valider le formulaire par le navigateur. 
                - **AJOUT DU CHAMPS "CSRF"** : sinon il y aura toujours une erreur car laravel veut absolument valider l'identité de l'utilisateur pour sur que c'est bien lui qui veut faire l'action. 
                    -   ```
                            <body>
                                <form method="POST" action="{{ route('posts.store')}}" novalidate>
                                    @csrf
                                </form>
                            </body>
                        ```
            - Creation de champs:
            - On rajout une methode si la method est differente de POST( Voir plus haut) 
            - Ajout de la fonction **old()**: qui permet de vérifier si il exite une ancienne entrée. c'est utile lorsque l'on se tromper dans le remplissage du formulaire et que que l'on doit le recommence. Les champs qui etaient correctent se remettent. 
                -   ```
                            <body>
                                <form method="POST" action="{{ route('posts.store')}}" novalidate>
                                    @csrf
                                    <imput type="text" name="titre" value="{{ old('titre')}}">
                                    <textarea name="post">{{ old('post')}}</textarea>
                                    <input type="submit" valuer="Publier">
                                </form>
                            </body>
                    ```
### Pour les password et confirmation du password
- Si on donne exactement le meme nom aàune autre champs suivis d'un **_confirmation** automatiquement laravel va vérifier que les deux champs sont bel et bien identique sinon il renvera une erreur. Pas besoin de developper un message d'erreur dans ce cas.
    -   ```
            <input type="password" name="password">
            <input type="password" name="password_confirmation">
        ```

### Configuration de la langue d'affichage des erreur: 
- Dans dossier **resources/lang/** on vient rajouter le dossier des message en francais. 
    - dans le fichier validation.php
        - un tableau avec une clef et un valeur 
            - Les cles sont les differentes regles que l'on pouvoir appliquer au differents champs des formulaires 
            - Les valeur c'esy si jamais la clef n'est pas respecter laravel vient recuperer le message d'erreur,la valeur, et l'affiche au niveau des message d'erreur
                - la ou il est marqué **:attibut**, c'est le nom de l'attribut (le name dans le formulaire)
                    - Si on veut changer le nom de l'attribut. 
                        - se rendre plus bas dans le fichier sur le table attributs. 

### validation des données 

- Dans le controlleur: 
    - On importe la classe **Validator**
        - `use Validator;`
    - Dans la fonction store: 
        - on cree une variable qui va contenir le resultat de la validation
            - on utilise la classe Validator
            - On cree la vallidation pour le formulaire: methode **make()**
                - Pour les paramettre de la methode **make()**
                    1. les champs du formulaire à l'aide de **$request** et de la methode **all()**
                        - **$request** c'est le contenu de la requette fait par le visiteur. si une personne soumet un formulaire, la requete contient tous les champs du formulaire avec les differentes valeurs qu'a renseigné le visiteur
                        **La request est toujours placer en premier** 
                    2. Un tableau dans lequel on indique les differents champs
                        - On renseigne le nom de l'attribut (le nom du champs) du formulaire 
                        - On renseigne dans une chaine de caractere les differentes regles que l'on souhaite attribué à ce champs
                            - Pour les differentes regles de valitation voir [ici](https://laravel.com/docs/8.x/validation#available-validation-rules)
                                - Possiblite de mettre plusieurs regles à l'aide de "|"
                                    - requis|unique dans la table|taille maximale
            -   ```
                    public function store(Request $request)
                    {
                        $validator = Validator::make($request->all(),[
                            'titre'=>'required|unique:posts|max:255',
                            'post'=>'required',
                        ]);
                    }
                ```
            - pour la verification : 
                - On fait un **if($validator->fails())** et si il renvois vrai, cela veut dire que l'on a des erreurs au sien du formulaire. 
                    - Danes le cas d'un vrai, on va redireiger l'utilisateur vers le formulaire avec les erreur et les anciens entrée.
                        - On fait un retour vers la precedente route à l'aide de la methode **back()**
                            - `return back()`
                        - Pour transmettrer les differentes erreurs 
                            - `withErrors($validator)`
                        - Pour transmettre les differents champs pur qu'il soient remis avec des fonction old 
                            - `withInput()`

                -   ```
                        public function store(Request $request)
                        {
                            $validator = Validator::make($request->all(),[
                                'titre'=>'required|unique:posts|max:255',
                                'post'=>'required',
                            ]);
                            if($validator->fails()){
                                return back()->withErrors($validator)->withInput();
                            }
                        }
                    ```
### Affichage des message d'erreurs: 
- Dans la vue et au dessus du formulaire:
    - Pour afficher les erreur on utilise un **@if** avec la variable **$errors**
        - La variable **$errors** est transmis lorsque l'on utiliser **withErrors**
            - On regarde  au niveau de la variable  si il existe une error qui porte le nom du champs avec la methode **has()**
                - Si la methode renvois vrai cela signifi qu'il y a au moin une erreur pour le champs mis en paramettre de la methode.
                (NB: les erreur dependend de ce que on a signifierpour le champs dans le constructeur,il peut donc y avoir plusieru erreur differentes).
            - Si il y a une erreur il faut l'afficher:
                - lamethode **first()** : ellepermet de recuperer la premiere erreur qui correspond au champs mis en paramettre de la methode.
            - On recopie le meme block de code pour tous les champs du formulaire. 
    - On referme le la condition if avec **@endif**

        ```
            <body>
                @if($errors->has('titre'))
                    {{ $errors->first('titre')}}
                @endif
                @if($errors->has('post'))
                    {{ $errors->first('post')}}
                @endif
                    <form method="POST" action="{{ route('posts.store')}}" novalidate>
                        @csrf
                        <imput type="text" name="titre" value="{{ old('titre')}}">
                        <textarea name="post">{{ old('post')}}</textarea>
                        <input type="submit" valuer="Publier">
                    </form>
            </body>
        ```
### Si les données sont validés:
- rediriger l'utilisateur sur la page souhaité: 
    - en dessous de la condition de validation qui se trouve dans le controleur. 
        - transmission d'une **donnée flash** qui va etre disponible seulement pendant la prochaine requete. car lorsqu'on va retourne sur la requete **post.create** qui est lier à l'action create, on va lui transmettre un message de validation.
            - Pour ce faire, on utilise la methode **with()** et on utilise n'importe quel mot qui va determiner le nim qu'aura la variable (ex: **withStatus** elle va creer une variable qui s'appelera **Status** elle va etre stock avec une **minuscule**) et paramettre on me un massage qui indique que la variable à bien ete enregistrer
                - **back()** : retour au formulaire 
                - **withStatus('message de confiramtion')**  
                    -   ```
                            public function store(Request $request)
                            {
                                $validator = Validator::make($request->all(),[
                                    'titre'=>'required|unique:posts|max:255',
                                    'post'=>'required',
                                ]);
                                if($validator->fails()){
                                    return back()->withErrors($validator)->withInput();
                                }
                                return back()withStatus('donnée enregistré')
                            }
                        ```

            - Pour recuperer cette variable dit variable de session: 
                - ca fonctionne comme les messages d'erreurs. 
                    -   ```
                            if(session('nom_de_la_variable'))
                                 {{ session('nom_de_la_variable')}}
                            @endif
                        ```
                    -   ```
                            <body>
                                @if($errors->has('titre'))
                                    <div class="message error"> // Pour lui donner une forme ccs/bootstrap/tail....
                                        {{ $errors->first('titre')}}
                                    </div>
                                @endif
                                @if($errors->has('post'))
                                    {{ $errors->first('post')}}
                                @endif
                                if(session('status'))
                                    {{ session('status')}}
                                @endif
                                    <form method="POST" action="{{ route('posts.store')}}" novalidate>
                                        @csrf
                                        <imput type="text" name="titre" value="{{ old('titre')}}">
                                        <textarea name="post">{{ old('post')}}</textarea>
                                        <input type="submit" valuer="Publier">
                                    </form>
                            </body>
                        ```

## Les Etapes

# Les étapes 
1. Installation de laravel avec composer:
    - `composer create-project laravel/laravel exercicetest`
    - `cd exercicetest`
    - `php artisan serve`
2. Gestion des **routes**, **controleurs**, **modeles** et **vues**
    1. Controller
        - `php artisan make:controller NomController`
            - Dans le fichier HTTP/Controllers/NomController:
                - `public function NomFonction(){return view('Dosier_de_vue.la_vue');}`
    2. Route
        - Dans le fichier routes/web.php 
            - `Route::get('url',[NomController::class,'Nom_fonction_controller'])->name('Nom_route');`
    3. Vue 
        - Dans le dossier resource/views
            - Creation du dossier de la vue et du fichier de la vue.
    4. Models
        1. Création du model et du fichier de migration 
            - `php artisan make:model Nom_du_model -m`
        2. Dans le fichier database/migration/Date_creation_create_NomModel_models_tables.php
            - définiton des colonnes 
        3. php artisan migrate
    5. seeding 
        - création d'un factory:
            - `php artisan make:factory Nom_du_modelFactory --model=Nom_du_model`
        - Dans le fichier dtatabase/factories/NomModel/Factory.php:
            - renseignement des paramettre.
                - `'NomColonne'=>$this->faker->paragraph()`
        - Création d'un seeder 
            - `php artisan make:seeder Nom_du_modelTableSeeder`
        - Dans le fichier database/seeder/Nouveau_fichier_creer.php
            - Mettre le nombre de fois que l'on veut seeder
                - Importation du model 
                    - `App\Models\Nom_du_model`
                - Dans la function run()
                    - `Nom_du_model::factory()->create()`
        - Dans le fichier database/seeder/DatabaseSededer.php
            - Dans la fonction run()
                - `App\Models\Nom_du_model::factory(Nombre de fake souhaité)->create()`
        - Seeder dansla Base de donnée
            - `php artisan db:seed`

3. Récupération des donnée dans les vues. 
    1. Dans le controleur de la vue:
        - Appelle le model 
            - `use App\Models\Nom_du_model`
        - Dans la fonction d'affichage
            - Creation d'une variable définis par le model et une fonction statique all(), find() ...
                - `$Nomvariable = Nom_du_model::all();`
                - `$Nomvariable = Nom_du_model::find(5);`
            - Retourne les donnée dans la vue 
                - return view('vue',['Nom_de_recupe_dans_la_vue'=>$Nomvariable]);
    2. Dans la vue 
        - Recuperation des données par une boucle si on souhaite afficher l'ensemble des donnée et via la fonction statique all():
            ```
                @foreach($Nom_de_recupe_dans_la_vue as $Nom_Alias)
                    {{$Nom_Alias -> 'Nom_colonne souhaité'}}
                @endforeach
            ```
        - Recuperation d'une donnée particuliere si on souhaite l'afficher et via la fonction statique find(Id_de la donnée):
            ```
                    {{$Nom_de_recupe_dans_la_vue -> 'Nom_colonne souhaité'}}
            ```

# Menu, sidebar et contenu


# Authentification 


[Retour](#Formation-pour-débutant-LARAVEL)