# LARAVEL STICKY-NAVBAR TAILWIND & JS-CSS 

1. Prequis:
    - node
        - `node -v`
    - npm 
        - `npm -v`
2. Installation de tailwind dans le projet laravel: [voir documentation](https://tailwindcss.com/docs/guides/laravel)
    1. Installation des dépendances frontales de laravel 
        - `npm install`
    2. Installlation de tailwind et de ses dépendances via npm 
        - `npm install -D tailwindcss@latest postcss@latest autoprefixer@latest`
    3. Creation du fichier de configuration **tailwind.config.js**
        - `npx tailwindcss init`
    4. Configuration de tailwind pour supprimer les styles inutilisés en production 
        - Dans le fichier de configuration 
            -   ```
                    module.exports = {
                    purge: [],
                    purge: [
                        './resources/**/*.blade.php',
                        './resources/**/*.js',
                        './resources/**/*.vue',
                    ],
                ```
    5. Configuration de tailwind avec Laravel mix [voir documentation](https://laravel.com/docs/8.x/mix#introduction)
        - Dans le fichier **webpack.mix.js**
            -   ```
                    mix.js("resources/js/app.js", "public/js")
                        .postCss("resources/css/app.css", "public/css", [
                        require("tailwindcss"),
                        ]);
                ```
    6. Inclure tailwind dans le CSS **ressources/css/app.css**
        -   ```
                @tailwind base;
                @tailwind components;
                @tailwind utilities;
            ```
    7. Ajout des balise dans les views 
        -   ```
                <!doctype html>
                <head>
                    <!-- ... --->
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                </head>
                <!-- ... --->

            ```
3. Creation du composant de la barre de navigation
    1. `php artisan make:component nom_du_composant`
        - fichier configuration: *app/View/Components/nom_du_composant.php*
        - fichier contenu: *ressources/views/components/non_du_composant.php*
    2. Création de la barre de navigation 
        -   ```
                <nav class="flex felx-wrap items-center justify-between p-5 bg-blue-200">
                    <div class="toggle hidden md:flex w-full md:w-auto text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none">
                        <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Lien 1</a>
                        <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Lien 2</a>
                        <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Lien 3</a>
                        <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Lien 3</a>
                    </div>
                </nav>
            ```
    3. Importation du composant de la bar de navigation dans la view souhaité 
        -   ```
                <div classe="..." id="idBarNavContenu">
                    `<x-nom_du_composant>`
                </div>
            ```
4. Compilation des fichier javascript et css dans le dossier public
    - Trois options:
        1. **npm run dev** ou **npm run prod** Permet à tous les éléments CSS et JavaScript de compilés et d'etre placés dans le repertoire **public**
        2. **npm watch** : La Commande continuera à s'exécuter dans le terminal et surveillera tous les fichiers CSS et JavaScript pertinents pour les modifications. Webpack recompilera automatiquement les ressources lorsqu'il détectera un changement dans l'un de ces fichiers.
        3. **npm run watch-poll**:  Webpack peut ne pas être en mesure de détecter les modifications des fichiers dans certains environnements de développement locaux. Si tel est le cas on utlise la commande watch-pollcommande. 

5. Creation du fichier javascript 
    1. Dans le dossier **public/js**
        - création du fichier `script.js`
    2. Dans le fichier *script.js*:
        -   ```
                // Lorsque l'utilisateur scrolle la page, la fonction "myFunction" s'execute
                window.onscroll = function() {myFunction()};

                // Récuperation de la barre de navigation par son id: idBarNavContenu
                var navbar = document.getElementById("idBarNavContenu");

                // Récupperation dela position décalée de la barre de navigation
                var sticky = navbar.offsetTop;

                // Ajout de la classe "stycky" à la barre de navigation lorsque l'utilisateur atteind 

                function myFunction() {
                    if (window.pageYOffset >= sticky) {
                        navbar.classList.add("sticky")
                    } else {
                        navbar.classList.remove("sticky");
                    }
                }
            ```
6. Création du fichier CSS 
    1. Dans le fichier **public/css/app.css**
        -   ```
                .sticky {
                    position: fixed;
                    top: 0;
                    padding:0px;
                    width: 100%;
                }
            ```
7. Importation des fichier dan sla view:
    - Le Css:
        -   ```
                <head>
                ...
                    <link href="{{ asset('css/app.css') }}" rel="stylesheet">`
                ...
                </head>
            ```
    - Le Js:
        -   ```
                <body>
                ...
                    <script src="{{ asset('js/script.js')}}"></script>
                ...
            ```