# Side bar avec tailwind (responsive)

1. La disposition de base 

    -   ``` 
            <div class="relative min-h-screen flex md:flex">
            // Boutton "bar de menu" pour afficher et cache la sider bar dans la responsivité 
                    1) la div de la side-bar : 
                <div>
                    // logo
                        ....
                    
                    // lien de navigation

                    <nav> ... </nav>

                </div>

                    2) la div du contenu de la page
                <div>

                </div>
            </div>
        ```    
        1. **flex** : permet d'aligne la bar de navigation a droit et le contenu de la page à droite. 
        2. **min-h-screen** : permet que un element d'etende sur toute la hauteur de la fenetre d'affichage minimale.
        3. **relative** : permet de positionner une element en fonction du flux norml du document. Les décalages sont calculés par rapport à la position normale de l'élément et l'élément servira de référence de position pour les enfants positionnés de manière absolue.
        4. **md:flex**: l'alignement des contenant lorsque la taille de l'ecran varie.


2. La "div" de la side par.

    -   ```
            <div class="bg-blue-800 text-blue-100 w-64 space-y-6 px-2 py-7 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out">
                <nav>...</nav>
            </div>
        ```
        1. **bg-blue-800** : La couleur du background 
        2. **text-blue-100** : la couleur du text
        3. **w-64** : la largeur du contenant de la div à l'affichage.
        4. **space-y-6**: mettre de l'espace verticalement entre les elements
        5. **px-2 et py-7**: donner de l'esapce de rembourage au contenant.
        - mettre la responsivité (retirer la div de l'affichage ...):
        1. **absolute**: permet de positionner un element en dehors du flux normal du document, en faisant en sorte que les elements voisins agissent comme si l'element n'existait pas.[voir doc](https://tailwindcss.com/docs/position).
        2. **inset-y-0**: Permet d'encrer des elements positionnés de maniere absolue contre n'importe quel bord du parent positionné le plus proche. [voir doc](https://tailwindcss.com/docs/top-right-bottom-left).
        3. **left-0**: Pour le positionner en 1er position.
        4. **transform**: Permet de controler la transformation des elements.
        5. **-translate-x-full**: transition d'un element en activant d'abord les transformation avec l'utilitaire transform, puis en spécifiant la direction et la distance de la translation à l'aide des utilitaires translate-x-... et translate-y-... (ici translation negative et toute la div disparait vers la gauche) [voir doc](https://tailwindcss.com/docs/translate).
        6. **transition**: transition de d'un etat à un autre.[voir doc](https://tailwindcss.com/docs/transition-property).
        7. **duration**: durée de la transition. [voir doc](https://tailwindcss.com/docs/transition-duration).
        8.**ease-in-out**: Permet de controler la transition dans les deux sens.[voir doc](https://tailwindcss.com/docs/transition-timing-function)


3. La "div" du contenu de la page 
    -   ```
        <div class="flex-1 p-10 text-2xl font-bold">
         le contenu ....
        </div>
        ```
        1. **flex-1**: permet à un element flexible de croitre et de rectrecir selon les besoins, en ignorant sa taille initiale. (ici il va prendre toute l'espace restant). [voir doc](https://tailwindcss.com/docs/flex)
        2. **p-10** : Le rembourage du conten. 
        3. **text-2xl**: la taille du text 
        4. **font-bold**: le texte en gras 

4. le logo  
    - voir sur le site [heroicons](https://heroicons.com/) par exemple et choisir une icon svg
    -   ```
            <a href="#" class="text-white flex items-center space-x-2 px-4">
                <svg class=" w-8 h-8 xmlns......">
                    <path ........ />
                </svg>
                <span class="text-2xl font-extrabold"> 
                    titre .. 
                </span>
            </a>
        ```
        1. **text-white** : couleur du text
        2. **flex** : positionement des contant cote à cote 
        3. **items-center**: centrer les elements 
        3. **space-x-2**: mettre de l'espace entre les elements. 
        4. **px-4**: mettre de l'espace de rembourage.
        5. **href="#"** : Lien du logo.
        6. **svg**: format du logo. 
        7. **w-8 et h-8** : la taille largeur et hauteur du logo
        8. **span** :est un conteneur générique en ligne (inline) pour les contenus phrasés
        9. **text-2xl** : taille du text 
        10. **font-extrabold** : text extra gras 

5. La "div" des lien de navigation
    -   ```
            <nav>
                <a href="" class="block py-205 px-4 rounded transition duration-200 hover:bg-blue-700 hover:text-white> lien 1 </a>
                <a href="" class="block py-205 px-4 ...> lien 2 </a>
                <a href="" class="block py-205 px-4 ...> lien 3 </a>
                <a href="" class="block py-205 px-4 ...> lien 4 </a>
            </nav>
        ```
        1. **block**: Permet de creer et de disposer les element en un niveau de block. [voir doc](https://tailwindcss.com/docs/display)
        2. **py-2.5 et px-4** : Mettre de l'espace dans le rembourage de l'element. 
        3. **rounded** : arrondi les angles du contenant. 
        4. **transition**: definis une transition entre une etat et un autre.[voir doc](https://tailwindcss.com/docs/transition-property).
        5. **duration**: permet de controler la durée de latransition(ici 200ms) [voir doc](https://tailwindcss.com/docs/transition-duration).
        6. **hover**: animation de changement de couleur du background lorsque on survole avec le curseur.
        7. **text-white**: text en blanc lorsque on survaole avec le curseur.

6. Le bouton de menu: 
    - Le principe: 
        - Le boutton va permettre d'enlever et de remettre la classe **-translate-x-full** ce qui permettra de faire apparaitre (afficher) la side bar et/ou la faire disparaitre(cacher).
            - Pour tester voir inspection de la page -> **.cls** -> coché et decoché la class et voir les effets dans la page.
    - intervention de **javascript**.
    - disposition de la div:
        -   ```
                <div class="bg-gray-800 text-gray-100 md:hidden">
                    // le logo
                    // la barre de menu
                </div>
            ```
            1. **bg-gray-...** : couleur du background.
            2. **text-gray-...**: coueur du text.
    1. conception: 
        -   ```
                <div class="bg-gray-800 text-gray-100 flex justify-between">
                    // le logo
                    <a href="#" class="block p-4 text-white font-bold"> titre</a>
                    // button de la barre de menu
                    <button class="p-4 focus:outline-none focus:bg-gray-700">
                        svg class=" w-5 h-5 xmlns......">
                            <path ........ />
                        </svg>
                    </button>
                </div>