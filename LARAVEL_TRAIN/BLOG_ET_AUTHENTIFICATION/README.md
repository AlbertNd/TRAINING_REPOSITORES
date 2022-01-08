### BLOG AVEC SYSTEME D'AUTHENTIFICATION

##### Création et confguration de la base de donnée ####

1. Definitions des variables d'environnement (préalablement créer la BD):
    - Dans le fichier `.env`:
        - Connection de la base de donnée. 
        - ...
2. Création des modeles ( dans cette exemple il y a des poste de catégorie et il y aura une seule catégorie par poste donc pas de many to many [Doc](https://laravel.com/docs/8.x/eloquent-relationships)). 
    - Création du model Post
        - `php artisan make:model Post -a` 
            - **NB:** Le petit "-a" [Doc](https://laravel.com/docs/8.x/eloquent#generating-model-classes) permet de creer le controleur, migration, le factory, le seeder .... tout en une seule commande      
    - Création du model Catégorie 
        - `php artisan make:model Categorie -m`
            - **NB:** Le petit "-m" [Doc](https://laravel.com/docs/8.x/eloquent#generating-model-classes) permet de geerer une migration de la base de donnée à la création du model
3. Checking des création faites. 
    - **Database:**
        - factories
        - migrations:
            - Il y a une table users qui concerne les utilisateurs 
            - Il y a une table post
            - il y a une table category
        - seeders
    - **Models:**
        - Categorie.php
        - Post.php
        - User.php 
4. Definition des champs souhaité pour les tables **(Dans migartions)**: 
    - la table post *(pas oublier d'importer les class)*: 
        -   ```
            Use App\Models\User;
            Use App\Models\Categorie;

                 Schema::create('posts', function (Blueprint $table) {
                    $table->id();
                    $table->string('titre');
                    $table->text('contenu');
                    $table->string('image');
                    $table->timestamps();

                    $table->foreignIdFor(User::class);
                    $table->foreignIdFor(Categorie::class);
                });
            ```
        - Création deux clefs étrangere qui sera lier au champs `id` de la table users
        - Création deux clefs étrangere qui sera lier au champs `id` de la table categorie
            - cela permattra de faire une relation `belong to user et belong to categorie` 
                - *un poste apartiendra a un utilisateur et un poste apartiendra à une categorie*
    - La table Categorie
        -   ```
                Schema::create('categories', function (Blueprint $table) {
                    $table->id();
                    $table->string('nom');
                    $table->timestamps();
                });
            ```
5. Definition des relations **(Dans Models)**
    - User.php *(un model generé directement par laravel)*:
        -   Il y aura plusieurs poste, qui appartiendront à un utilisateur il faut donc une reation **hasMany**
            -   ```
                    public function posts(){
                        return $this->hasMany(Post::class);
                    }
                ```
    - Categorie.php
        -   Il y aura plusieurs poste, qui appartiendront à une catégorie il faut donc une reation **hasMany**
            -   ```
                    public function posts(){
                        return $this->hasMany(Post::class);
                    }
                ```
    - Post.php
        - Le post quand a lui appariendra à un ustilisateur "user" et à une categorie 
            -   ```
                    public function user()
                    {
                        return $this->belongsTo(User::class);
                    }
                    
                    public function categorie()
                    {
                        return $this->belongsTo(Categorie::class);
                    }
                ```
6.  On teste la base de donner **(factories & seeders)**
    - [Doc]
        -   Laravel fournit une variété permattent da facilité les test des application pilotées par des base de données. Les [factories](https://laravel.com/docs/8.x/database-testing#generating-factories) et [seeder](https://laravel.com/docs/8.x/seeding) permettent de créer facilement des enregistrements de base de données de test à l'aide des models et des relations de l'application. 
    - Les factories:
        - Categorie (Création du factory de categorie car pas ete generer automatiquement)
            - `php artisan make:factory CategorieFactory`
        - Defintion de la factory de Categorie 
            - On le relie au model Categorie
                - `protected $model = Categorie::class;`
                    - Sans oubilier d'y importer la class Categorie `use App\Models\Categorie;`
            - On definit les champs à l'aide de la fonction [Faker](https://fakerphp.github.io/)

                ```
                class CategorieFactory extends Factory
                {
                    /**
                    * Define the model's default state.
                    *
                    * @return array
                    */

                    protected $model = Categorie::class;

                    public function definition()
                    {
                        return [
                            'nom' => $this->faker->sentence(rand(1,3),true)
                        ];
                    }
                }

                ```
    - Le user : 
        - Il y a un factory defini automatiquement 
    - Le Post :
        -   ```
                public function definition()
                {
                    return [
                        'titre' => $this->faker->sentence(rand(5,10),true),
                        'contenu'=> $this->faker->sentence(5,true),
                        'image'=>'http://via.placeholder.com/1000'
                    ];
                }
            ```       
    - **Pour eviter d'avoir des erreurs de [mass assignment](https://laravel.com/docs/8.x/eloquent#mass-assignment) on va definir une propriete `$guarded` correspondant à un tableau vide, à nos models***( ou alors on devra creer manuellement les tableau  transmis aux methodes)*
        - Models/Post : `protected $guarded = [];`
        - Models/Categorie : `protected $guarded = [];`
        - Models/User : il a son propre champs `$fillable[]`

7. Ensemencer la base de donnée **(dans seeder)**
    - Par defaut, une classe `DatabaseSeeder` y est defini automatiquement. 
    - DatabaseSeeder :
        - Création de 5 categorie:
            -   ```
                public function run()
                {
                    \App\Models\Categorie::factory(10)->create();
                }
                ``` 
                - On peut importer la class pour une facilité de lecture 
                    -   ```
                            use App\Models\Categorie;
                            
                                    public function run()
                                    {
                                        Categorie::factory(5)->create();
                                    }
                        ```
        - Creation des utilisateur "user"
            -   ```
                use App\Models\User;
                        public function run()
                        {
                            User::factory(10)->create()-each(function($user){
                                Post::factory(rand(1.3))->create([
                                    'user_id'=>$user->id;  

                                    // Pour la categorie voir "SUITE" plus bas   
                                ])
                            });
                        }
                        
                ``` 
                - Methode `each()` permettant de creer un callback pour chaque utilisateur créer  
                    - $user : permettant de recupere le user à chaque fois
                        - à chaque qu'on aura creer un user on pourra definir un nouveau post *(on defini entre 1 et 3 post pour un utilisateur)*
                            - Pas oublier d'importer la class Post 
                                - `App\Models\Post`
                        - `create([...])` on definir des champs des id pour le user et le categorie *On ne les a pas defini dans les factory*
        - "SUITE"
            -   ```
                use App\Models\User;
                use App\Models\Categorie;
                use App\Models\Post;

                public function run()
                {
                    $categorie = Categorie::factory(5)->create();
                    User::factory(10)->create()->each(function($user) use($categorie){
                                Post::factory(rand(1.3))->create([
                                    'user_id'=>$user->id;  
                                    'categorie_id' => ($categorie->random(1)->first())->id   
                                ])
                            });
                }
                ```
                - **NB** : ceci va creer 5 categories, 10 utilisateurs, pour chaque utilisateur ( grace à la fonction each()) on aura entre 1 et 3 post (via le factory ) qui sont lier à l'utilistauer. le User va creer un user_id et enfin on va recupere de maniere aleatoire les categorie et on chope la premiere et on prend son id 

8. Migration de la base de donnée 
    - `php artisan migrate`
        - Permet de migrer la BD 
        - Si erreur, on la corrige et ensuite :
            - `php artisan migrate:refresh`
9. Encemencement de la bd 
    - `php artisan db:seed`

##### Installatoin du systeme d'authentification 

1. [Documentation de Laravel Breeze](https://laravel.com/docs/8.x/starter-kits). 
    - [Installation](https://laravel.com/docs/8.x/starter-kits#laravel-breeze-installation).
        1. `composer require laravel/breeze --dev`
        2. `php artisan breeze:install`
        3. `npm install`
        4. `npm run dev`
        5. `php artisan migrate`*(Normalement pas de tables à migrer car on l'a deja fait precedement)*
2. verification en se rendans sur le projet en visuelle local 
    - `php artisan serve` => *http://127.0.0.1:8000*
        - Il devrait y avoir un section **Log in** et **Register**
3. On se creer un compte pour voir si tout fonctionne correctement
            

##### La mise en place du front ####


1. On definis prealablement les routes: 
    - Dans le cas ou l'on veut faire la liste des poste sur la page d'acceuil. 
        - Dans `web.php`:
            - Definir un route **ressource** que l'on appele *post*:
                - `Route::resource('post',PostController::class)` *On y appelle le controller PostController precedement créer automatiquement via la commande php artisan make:model Post -a le f  ait de rajouter le petit -a nous acreer les differentes methodes*
                - On liste nos route pour vérification 
                    - `php artisan route:list --name=post` *permet de recuperer les URL lier à la route post*
                - On remarque que la route index n'est pas la route racine. 
            - Si on veut que la route `/post` soit la route racine: 
                - `Route::resource('post',PostController::class)->except('index')`
                    - *En refaisant une vérification on vera bien qu'elle à disparu*
                    - **NB**: On aura toujours la route post mais plus en GET mais en POST et qui nous permettra d'enregistrer un post. 
            - **Pour la definir comme la route racine  on va utiliser la route GET**
                - En lui passant le `PostController` et la class `index`
                    - `Route::get('/',[PostController::class,'index'])`
                        - Vérification `php artisan route:list` *Pour constater que la route principale appelle bien la class index*
                - On lui defini un nom: 
                    - `Route::get(['/',PostController::class,'index'])->name('post.index')`
                        - vérification pour etre sur `php artisan route:list --name=post`. 

2. Configuratiopn de la class index 
    - Dans le PostController: 
        -   ```
                public function index()
                {
                    return view('post.index');
                }
            ```
3. Création de la vue *(Voir suite section vue index)*
    - Dans le dossier `resources/views`:
        - Création dossier *post* contant la vue *index.blade.php*. 

4. Etant donné que nous avons installer breeze, on beneficie d'un **app layout**
    - Dans dossier `views/layout`
        - Utilisation de laravel component ce qui parmet de pouvoir faire herité tout nos vues des composant qui se trouve dans ce dossier. 
5. **Editation pour beneficier des composant**
    1. Dans `layouts/app.blade.php`:
        - **Page Heading** 
            - Pour lequel il faut renseigner le header `{{$header}}` 
        - **@include('layouts.navigation')**
            - Elle inmporte le layouts de la bar de navigation. 
    2. Dans  `layouts/navigation.blade.php`:
        - **Dans le settings Dropdown** *(Le menu deroulant qui se situe en haut à droite dans la navbar)*:
            - il part du principe que l'on est connecter 
            - On a un **x-slot** avec une entete qui est necesaire *name="trigger"*
                - On peut voir qu'il happeler un **Auth username** `{{Auth::user()->name}}`.
                    - Dans notre cas on est en guest et on est pas connecter. 
                    - **Il va donc faloir faire deux menu different : un lorsque l'on est connecter et un lorsque l'on est pas connecter**  
                        - Pour ce faire, on fait deux dropdown *(@auth et @endauth, @guest et @endguest): 
                            - Lorsque l'on est connecté
                                ```
                                    @auth
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <div>{{ Auth::user()->name }}</div>

                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                        @endauth
                                ```
                            - Lorsque l'on est pas connecté
                                ```
                                    @guest
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                    @endguest
                                ```
            - **Dans Authentification** *(du dropdown de la partie guest)*
                - On defini le name trigger *(ce qui s'affiche en haut du dropdown: le bouton clickable)* 
                    - `<div>{{ Auth::user()->name }}</div>` => `<div>Menu</div>`
                - Ensuite le **x-slot name="content"** *(c'est juste un lien)*
                    - Rajout d'une route **se connecter** *(de base on a tout un formulaire puisqu'il faut passer la déconnection en post)*
                        - C'est on fait dans notre cas,
                            1.  Retirer le formulaire
                            2.  Retire la logique javascript
                            3.  Passer la route **login** 
                            4.  Mettre comme titre **se connecter**. 
                                -   ```
                                        <x-dropdown-link :href="route('logout')">
                                            {{ __('Se connecter') }}
                                        </x-dropdown-link>
                                    ```
                    - Rajout d'une route **s'enregistre**
                        -   ```
                                <x-dropdown-link :href="route('register')">
                                    {{ __('S\'enregistrer') }}
                                </x-dropdown-link>
                            ```
                - **NB:** Il devrait y avoir une erreur puis que tout en bas on a la meme chose mais pour le responsive.
                    - Pour eviter l'erreur on pas passe la section **Responsive Settings Options** en auth
                        -   ```
                                @auth  
                                    <div class="pt-4 pb-1 border-t border-gray-200">
                                        <div class="px-4">
                                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                        </div>

                                        <div class="mt-3 space-y-1">
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-responsive-nav-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-responsive-nav-link>
                                            </form>
                                        </div>
                                    </div>
                                @endauth
                            ```
#### LA vue index.blade.php 

1. Importation des composantes 
    - **x-app-layout**
    - **x-slot name="header"** *(Pour une question de facilité, on peut reprendre celui qui se trouve dans dashboard)*
        -   ```
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Blog') }}
                    </h2>
                </x-slot>
            ```
2. Modification de la bar denavigation: 
    - **layout/navigation.blade.php**
        - Section **Navigation Links**
            - On peut le configurer suivant les cas souhaiter **(@auth ou @guest)**
3. Mise en place du contenu 
    - Soit le realiser soit meme 
    - Soit se rendre sur des sites de composant telle que [tailwindcomponent](https://tailwindcomponents.com/search?query=blog)
        - copier/coller le scripts dans la vue **index**
            -   ```
                    <x-app-layout>
                        <x-slot name="header">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Blog') }}
                            </h2>
                        </x-slot>
                        // Le scripts copié
                    </x-app-layout>
                ```
            - `npm run dev` pour compliler l'ensemble.
        - Configuration du scripts pour avoir le resultats souhaité 
            - Création des autres vues telle que le footer, ... dans un dossier `partials/footer`
                - `resources/views/partials/footer.blade.php`

##### Rajout des posts 

1.  Dans **PostController**:
    1. Mettre dans la mthode index une requete [Eloquent](https://laravel.com/docs/8.x/eloquent) qui permet de recupere tous les post
        - `$posts=Post::all();`
    2. Passer la requete dans le vue 
        - `return view('post.index',compact('posts'));`
2. **Dans la vue index, on peut boucler sur les different posts**
    - Recuperation de la variable posts et la boucle à chaque fois sur un item post 
        -   ```
            @foreach($posts as post)
              {{$post-> variable de la table souhaité}}
            @endforeach
            ```
        - Disposition des div, contenant titre ... en fonction de la forme souhaité 
        - Format des variable 
            - Par exemple : 
                - Pour la date : `{{$post->created_at->format('d m y')}}`
3. Pour ce qui est des categorie . 
    - vue que l'on a creer une realation **on à la fonction categorie** dans `HTTP/Models/Post.php`: 
        - Pour l'appeler :
            - `$post->categorie-name` et on la la categorie lier au post. 
                - **NB:** *de qu'il recupere un post, il va lui faire une requete et cette requete va lui recuperer la categorie et va afficher le name e donc si on affiche 50 requete, il va nous faire 50 requete* 
    - Pour qu'il face la reque en **where-in**
        - Dans **PostsController** La fonction undex:
            - `$posts = Post::with('categorie')->get()` *on appelle le nom de la relation qui est ici categorie*
                - **NB:** Ce nest plus un **all()** mais un **get()**
4. Pour la mise en forme d'affichage *(par exemple le titre, le contenu, ...)*
    - Si on souhaite avoir la premiere lettre en majuscule pour le titre 
        - Soit directemet dans la vue: 
            - `{{Str::title($post->title)}}`
        - Soit via le **models** 
            - Création d'une fonction:  
                - Pas oublier d'importer la fonction souhahité
                -   ```
                        public function getTitreAttribute ($attribute)
                        {
                            return Str:titre($attribute);
                        }
                    ```