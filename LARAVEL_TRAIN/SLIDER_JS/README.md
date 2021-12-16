# IMAGES SLIDER AVEC JAVASCRIPT

### Configuration des composant 

1. Installation de npm
    - npm install
2. Installation de tailwind 
    - [voir doc](https://tailwindcss.com/docs/guides/laravel)
1. Connecter un fichier js dans l'application 
    1. Creation du fichier dans le dossier `ressource/js`
        - `scripts.js`
    2. Configuration du fichier crée dans le fichier `webpack.mix.js`
        -   ```
                mix.js('resources/js/app.js', 'public/js')
                .js('resources/js/scripts.js', 'public/js')
                .postCss('resources/css/app.css', 'public/css', [
                require("tailwindcss"),
                        ]);
            ```
    3. Commande `npm run watch` ou `npm run dev`
    4. Relier le fichier `scripts.js` à la vues 
        - `<script src="{{ asset('js/scripts.js')}}" defer><script>`
### Develeppement du scripts 

1. la vue (doit etre ameliorer)
    -   ```
            <!doctype html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </head>

        <body>

            <div class="relative bg-red-500 min-h-96 flex flex-col justify-center items-center" id="test">

                <div class="shoSlides bg-blue-800 h-96 w-96 flex justify-center items-center" id="parent">
                    <div class="mySlide hidden" id="mySlide">
                        <div class="text ">
                            texte 1
                        </div>
                    </div>
                    <div class="mySlide hidden " id="mySlide">
                        <div class="text">
                            texte 2
                        </div>
                    </div>
                    <div class="mySlide hidden " id="mySlide">
                        <div class="text">
                            texte 3
                        </div>
                    </div>
                </div>
                
                        <button class=" bg-green-500 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer rounded-full z-10 inset-y-0 left-1/3 my-auto" id="prevbtn">
                            &#10094;
                        </button>
                    
                    
                        <button class=" bg-blue-500 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer rounded-full  z-10 inset-y-0 right-1/3 my-auto " id="nextbtn">
                            &#10095;
                        </button>
                    
                </div>


            </div>

            <script src="{{ asset('js/scripts.js')}}" defer></script>
        </body>

        </html>

        ```
2. le scripts JS ( à commenter)

    -   
        ```
            var slideIndex = 1;

            showSlides(slideIndex);

            const prev = document.getElementById('prevbtn');
            const next = document.getElementById('nextbtn'); 

            prev.addEventListener('click', event =>{
                showSlides( slideIndex += -1)
            })

            next.addEventListener('click', event =>{
                showSlides( slideIndex += 1 )
            })

            function showSlides(n){
                var i;
                var slides = document.getElementsByClassName('mySlide');
                if(n> slides.length){
                    slideIndex = 1
                }
                if(n<1){
                    slideIndex = slides.length
                }
                for(i=0;i<slides.length;i++){
                    slides[i].classList.replace('block','hidden');
                }
                slides[slideIndex -1].classList.replace('hidden','block');
                console.log(slides[slideIndex -1]);
                
            }
        ```