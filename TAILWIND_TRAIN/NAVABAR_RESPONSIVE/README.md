## Barre de navigation responsise 

[Documentation](https://tailwindcss.com/docs)

1. Création fichier HTML:
    -   ```
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <title>Responsive Navbar - Tailwind CSS</title>
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />      
            </head>
            <body>
                <!-- navbar here -->      
                <script src="script.js"></script>
            </body>
            </html>
        ```
2. L'element d'habillage de la barre de navigation :
    -   ```
            <nav class="flex flex-wrap items-center justify-between p-5 bg-blue-200">      
            <!-- logo -->
            <!-- hamburger -->
            <!-- links -->
            <!-- cta -->
            </nav> 
        ```
        - `flex flex-wrap`: s'afficher en utilisant la méthode flexbox et envelopper les éléments plus grands que le parent.
        - `items-center`: aligner les éléments le long du centre de l'axe des x.
        - `justify-between`: répartit uniformément les éléments de la barre de navigation sur l'axe horizontal.
        - `p-5`: Rajout du remplissage de tous les côtés de la barre de navigation.
        - `bg-blue-200`: couleur bleu clair pour le background.
3. Placement du logo:
    - `<img src="http://acmelogos.com/images/logo-1.svg" alt="ACME" width="120" />`
4. Placement du bouton "hamburger" pour la modification de la visibilité du menu sur les petits ecrans 
    -   ```
           <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png" width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png" width="40" height="40" />
            </button>
            </div> 
        ```
        - `flex` && `md:hidden`: Tailwind CSS suit l'approche "mobile-first", c'est-à-dire que nous construisons du petit écran au grand écran. Dans cet exemple, le hamburger est visible sur les petits écrans (flex) puis caché sur les écrans de taille moyenne (md:hidden) et supérieure.
        - `toggle` : Nous avons également utilisé une classe de basculement qui ne fait pas partie de Tailwind. Cette classe sera appliquée à tout ce dont nous voulons faire basculer la visibilité lorsque le bouton hamburger est cliqué.
        - 


5. Placement des liens (Les liens sont dans un contenant "div" et on utilise encore un "toggle")
    -   ```
                <div class="toggle hidden md:flex w-full md:w-auto text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none">        
                    <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Home</a>
                    <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Products</a>
                    <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Pricing</a>
                    <a href="#" class="block md:inline-block text-blue-900 hover:text-blue-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Contact</a>
                </div>
        ```
        - `hidden md:flex`: masquer les liens sur les petits écrans jusqu'à ce que la visibilité soit modifiée.
        - `w-full md:w-auto`: afficher le menu en pleine largeur sur les petits écrans uniquement.
        - `text-right text-bold`: aligner à droite le texte avec un poids de police gras.
        - `mt-5 md:mt-0`: applique une marge au haut du menu.
        - `border-t-2 border-blue-900`: Bordure de séparation bleue unique de 2px en haut du menu.
        - `md:border-none`: supprimer la bordure sur les écrans plus grands.
        - `block md:inline-block`: afficher en bloc sur les petits écrans et en ligne sur les grands écrans.
        - `text-blue-900 hover:text-blue-500`:texte bleu qui s'éclaircit au survol.
        - `px-3 py-3`: un remplissage régulier sur l'axe des x (horizontal) et sur l'axe des y (vertical).
        - `border-b-2 border-blue-900`: bordure bleue de 2px en bas des liens.
        - `md:border-none`: supprimer la bordure sur les écrans plus grands.
6. Inclure une boutton CTA à l'extreme droite de la barre de navgation
    - `<a href="#" class="toggle hidden md:flex w-full md:w-auto px-4 py-2 text-right bg-blue-900 hover:bg-blue-500 text-white md:rounded">Create Account</a>`
        - La seule classe que nous n'avons pas utilisée précédemment est `md:rounded` qui applique un rayon de bordure donnant aux coins du bouton une apparence légèrement arrondie.
7. Configuration du javascript:
    -   ```
            document.getElementById("hamburger").onclick = function toggleMenu() {
                const navToggle = document.getElementsByClassName("toggle");
                for (let i = 0; i < navToggle.length; i++) {
                    navToggle.item(i).classList.toggle("hidden");
                }
            };
        ```
        - Ceci permet de faire basculer la classe cachée sur les éléments à bascule lorsque l'on clique sur le hamburger.