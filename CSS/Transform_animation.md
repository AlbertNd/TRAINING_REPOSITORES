# Transfom Animation  Transition 

#### Transforme

[Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Transform)
[Fonctionnement des transformation](https://developer.mozilla.org/fr/docs/Web/CSS/transform-function)

- La propriété permet d'applquer des transformations aux elements css comme par exemple des translations, des rotation, des redimensionement, ...
- ***Elle peut, voir mieux, faire le travail des positionnement***
- Elle prend en valeur differentes fonction, avec argument, de transformation : 
    1. **translate**: Il va permetre de deplacer une eeent par rapport à l'axe **X** et **Y**
    2. **scale** : Il permet d'étirer un element ou de le retrecir 
    3. **rotate** : Il permet d'effectuer une rotation 
    4. .... [voir doc](https://developer.mozilla.org/fr/docs/Web/CSS/Transform)
        - Il est possible des les combiner 
            ```
                .selecteur:hover {
                    transform: scale(1.1) rotate(100deg);
                }
            ```

#### Animation 

Les animations peuvent etre fait de deux maniere : 

[Les argument d'animation](https://developer.mozilla.org/fr/docs/Web/CSS/animation)

1. **Transition** [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Transition): Permet de passer d'une valeur à l'autre de maniere plus controlé 
    - La syntaxe 
        -   ```
                .selecteur{
                    color: red;
                    transition : color .5.s; 
                }
                
                .selecteur:hover{
                    color: green;
                }
                
                // Ou alors 

                .selecteur{
                    transition : transform .5.s; 
                }
                .selecteur{
                    transition : margin-right .5.s; 
                }
            ```
            - 
    - Les argument 
        - Propriété
        - Durée : temps d'execution
        - Delait : Le temps d'attentes avant execution 
        - Fonction d'animation (accelération et deceleration "ease-in-out")
            - Pour la gestion de ses  fonctions : 
                - Dans l'inspecteur de l'element. 
                    - dans transition => ease-in-out => gestion avec les cursor afin de determiner l'effet souaité => copier la fonction d'animation

2. **@keyframes** [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/@keyframes) 

    1. On ecris la régle **@keyframes** et ensuite on donne un **nom** à l'animation
    2. En suite on definis un **from** et un **to** 
        - from : les valeurs de depart de mon element 
            - Peut etre exprimé en % 
        - to : Les valeurs d'arrivé de l'element 

        -   ```
                @keyframes slideDown{
                    from{
                        transform : translateY(200px);
                        opacity: 0;
                    }
                    to{
                        transform : translateY(0);
                        opacity: 1;
                    }
                }


                 @keyframes slideDown{
                    0%{
                        transform : translateY(200px);
                        opacity: 0;
                    }
                    100%{
                        transform : translateY(0);
                        opacity: 1;
                    }
                }
            ```
    3. Utiliser le nom ainsi créer dans les elements souhaités grace à la propriété animation 
        -   ```
                .selecteur{
                    animation : slideDown 10s(optionel); 
                }

            ```
    4. L'animation fill mode pour determiner l'etat finale de l'animation [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/animation-fill-mode).

