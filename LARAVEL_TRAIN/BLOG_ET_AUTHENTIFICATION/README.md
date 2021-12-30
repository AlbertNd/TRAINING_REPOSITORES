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

##### La mise en place du front ####
