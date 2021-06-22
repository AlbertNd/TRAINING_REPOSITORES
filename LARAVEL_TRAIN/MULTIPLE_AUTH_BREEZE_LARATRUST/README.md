# Les etapes

1. [Installation de laravel](https://laravel.com/docs/8.x/installation)
2. Creation d'une base de donnée (utf8mb4_unicode_ci)
3. Connection de la base de donnée:
    1. `fichier: .env`
    2. `php artisan migrate`
4. [Installation de laravel Breeze](https://laravel.com/docs/8.x/starter-kits) 
    1. `composer require laravel/breeze --dev`
    2. `php artisan breeze:install`
    3. `npm install && npm run dev`
    4. lancement du serveur pour verifiaction
        - `php artisan serve`
5. [Installation de laratrust](https://laratrust.santigarcor.me/docs/6.x/installation.html)
    1. `composer require santigarcor/laratrust`
    2. `php artisan vendor:publish --tag="laratrust"`
        - **NB**: Si cette commande ne publie pas de fichiers, il est probable que le fournisseur de services Laratrust n'a pas été enregistré. 
        Essayez de vider votre cache de configuration:
        - `php artisan config:clear`
    3. `php artisan laratrust:setup`
    4. Avant de poursuivre il est preferable de lancer un seeder: 
        1. Usage
            - [Seeder](https://laratrust.santigarcor.me/docs/6.x/usage/seeder.html)
                1. `php artisan laratrust:seeder`
                2. `php artisan vendor:publish --tag="laratrust-seeder"`
                3. `composer dump-autoload`
                4. Copier la commande ci-dessous dans dans la fonction run du fichier `database/seeds/DatabaseSeeder.php`
                    - `$this->call(LaratrustSeeder::class);` 
    5. Avant de lance la migration et le seeder: on peut configurer les roles en ce qui concerne l'application. 
        - voir le fichier:`config/laratrust_seeder.php`
        - **NB** : Par defaut il y a differente roles pour les utilisateurs que l'on peut modifier à notre convainance
    6. `php artisan migrate`
    7. Véfication de la creation des tables de laratrust dans la base de données:
        -   ```
                - permissions
                - permissions_role
                - permission_user
                - roles
                - role_user
                - users
            ```
    8. Pour vérifier le remplissage de la base de donnée par defaut:
        - `php artisan db:seed`
            - Voir dans la colonne "roles"
                - l'**id** et le **name** pour la manipulation dans l'application
                - le **display_name** pour les panneau de commande ...
6. Attribution des roles pour les utilisateurs 
    1. Usage:
        1. [roles et permissions](https://laratrust.santigarcor.me/docs/6.x/usage/roles-and-permissions.html)
            - [User Roles Assignment & Removal](https://laratrust.santigarcor.me/docs/6.x/usage/roles-and-permissions.html#user-roles-assignment-removal)
                - [Assignement](https://laratrust.santigarcor.me/docs/6.x/usage/roles-and-permissions.html#assignment-2)
                    - `$user->attachRole($admin);`
    2. Dans le fichier `app/Http/Controllers/Auth/RegisterUserController.php`
        - en dessous de `Auth::login($user = .....);`
            - Coller `$user->attachRole($admin);`
                - Pour l'attribution de role on utilisera le **name** ou l'**id** de la database `attachRole('name or id ')` 
                par exemple `$user->attachRole('user');` ou alors `$user->attachRole('2');`)

    **NB:** A partir de là lorsqu'on va creerun nouvel utilisateur, laratrust va lui attribuer automatiquement le role d'un simple utilisateur dans l'application.
7. attribution, sur le meme dashboard, des different menu en fonction du type d'utilisateur 
    1. Dans le dossier Routes:
        1. Le fichier `web.php`
            1. Modification de la route qui s'y trouve deja
                -   ```
                        Route::group(['middleware' => ['auth']], function(){
                            Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
                        });   
                    ```
    2. Creation du controller : `DashboardController`
        1. Dans le terminale :
            - `php artisan make:controller DashboardController`
    3. Creation de la methode: `index`
        1. Dans le fichier `Http/Controller/Auth/DashboardController.php`
            - Dans la classe `DashboardController`:
                - C'est ici que l'on doit decider si l'utilisateur est juste un simple utilisateur ou si il faut lui attribuer d'autres roles afin de pouvoir montre differente pages en fonction du type de l'utilisateur
                - [Roles & Permissions](https://laratrust.santigarcor.me/docs/6.x/usage/roles-and-permissions.html#setting-things-up)
                    - [Checking for Roles & Permissions](https://laratrust.santigarcor.me/docs/6.x/usage/roles-and-permissions.html#checking-for-roles-permissions)

                -   ```
                        public function index(){
                            if(Auth::user()->hasRole('user')){
                                return view('userdashboard')
                            }elseif(Auth::user()->hasRole('autre')){
                                return view('autredashboard')
                            }elseif(Auth::user()->hasRole('admin')){
                                return view('dashboard')
                            }
                        }
                    ```
    4. Creation des views qui seront accessible en fonction du type de l'utilisateur
        - Dans le dossier `ressource/views`
            - Pour une question de faciliter on copie coller le contenu de la page dashoarde de base que l'on poura modifier à notre guise
    5. Pour etre sur de pouvoir importer la la classe d'Auth dans la fonction index, Vrifier si on a bien la ligne : **use Illuminate\Support\Facades\Auth** dans le controller `DashaboardController`
    6. Le menu :
        1. dans le fichier :`ressource/views/layouts/navigation.blade.php` se trouve le maenu ar defaut. section `<!-- Navigation Links -->`
        2. Pour la creation d'un second lien, il suffit de copier coller le lien present et de l'adapter en fonction.
            - Modifiier le route :  ```
                                        href="route('dashboard.myprofile')" ...->routeIs('dashboard.myprofile')">`
                                        {{__('My profile')}}
                                    ```
        3. Creation de la route `doshboard.myprofile` en specifiant quel type d'utilisateur peuvent voir le lien.
            1. Dans le fichier `routes/web.php`:
                1.  route pour profile d'utilisateur authentifié en tant que utilisateur:
                    -   ```
                            Route::group(['middleware' => ['auth','role:user']], function(){
                                Route::get('/dashboard/myprofile','App\Http\Controllers\DashboardController@myprofile) -> name('dashboard.myprofile');
                            });
                        ``` 
            2. Creation de la methode `myprofile`
                1. Das le DashboardController:
                    -   ```
                            public function myprofile(){
                                return views('myprofile');
                            }
            3. Creation de la views `myprofile`
                1. Dans le dossier views
                    - Pour une question de simpliciter on peut copier et coller le contenu da la views dashabord par defaut et ensuite l'adapter
                    - Si l'on souhater afficher le nom et le mail de l'utilisateur:
                        - `{{Auth::user()->name}} <br> {{Auth::user()-email}}`
    7.  Limitation de la vision du menu des liens en fonction du type d'utilisateur 
        1. dans le fichier `ressource/views/layouts/navigation.blade.php`:
            - On y met les condition **@if ...@endif**
            -   ```
                    Lien visible par tous 

                    @if(Auth::user()-> hasRole('user'))
                        Lien visible uniquement pour les utilisateur de type user
                        (NB: Pas oublier de changer les routes, creer les methodeset adapter leur views en fonction des role: web.php)
                    @endif
                    @if(Auth::user()-> hasRole('autre'))
                        Lien visible uniquement pour les utilisateur de type autre
                        (NB: Pas oublier de changer les routes, creer les methodes et adapter leur views en fonction des role: web.php)
                    @endif
                    @if(Auth::user()-> hasRole('admin'))
                        Lien visible uniquement pour les utilisateur de type administrateur
                        (NB: Pas oublier de changer les routes, creer les methodes et adapter leur views en fonction des role: web.php)
                    @endif
                ```
8. Customisation de la page de l'erreur 404:
    - Dans le fichier `config/laratrust.php`
        - Ligne 187 : 'message'
