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