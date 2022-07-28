# Presentation
[DevDocs.io](https://devdocs.io/css/)
[Documentation MDN](https://developer.mozilla.org/en-US/docs/Web/CSS)
[Site de simulation de selection](https://flukeout.github.io/)

### Table matiere 
1. [La syntaxe](#la-syntaxe)
2. [Placement CSSS](#ou-placer-le-css)
3. [Les selecteurs](#les-selecteurs)
    1. [Le Ciblage](#le-ciblage)
    2. [Combinaison des selecteurs](#combinaison-des-selecteurs)
    2. [Les selecteurs d'attributs](#les-selecteurs-dattribut)
4. [Les pseudo classes](#les-pseudo-class)
5. [Model de boite](#le-modele-de-boites)
    1. [Comportement de la voite vis à vis des autres elements](#comportement-de-la-boite-vis-à-vis-des-autres-elements)
6. [Police et textes](#police-et-textes)
    1. [Propriété](#les-propriétes)
    2. [Les unites de mesures](#les-unittes-de-mesure)
7. [Le positionnement](#le-positionement)

#### La syntaxe 

- Trois composnat principaux. 
    1. ##### Le selecteur 
    2. ##### Les propriétés 
    3. ##### La valeur 
```
Selecteur {
    propriété: valeur; 
}
```

#### Ou placer le CSS 

1. Dans un attribut 
    ```
        <div style="propriété : valeur"> </div>
    ```
2. Dans l'entete du document 
    ```
        <head>
            <style>
                selecteur{
                    propriété: valeur;
                }
            </style>
        </head>
    ```
3. Dans un fihier séparé
    ```
        <head>
            <link href="chemin versle fichier" rel="style du document(stylesheet)">
        </head>
    ```

#### Les selecteurs 

##### le ciblage. 

1. Pour cibler l'ensembles des balises portant le meme nom :
    - ``` 
        h1 {
            ...
        }
      ```
2. Selection des elements suivant leur **id** ou leur  **class**
    1. Pour cible la **classe: 
        - **.** *nom_de_la_classe*
        ```
            .titre{
                ...
            }    
        ```
        - NB: tous les elements ayant ce nom de classe seront affectés 
    2. Pour cible l'**id**
        - **#** *nom_id*
        ```
            #titre{
                ...
            }    
        ```
    3. Le selecteur **" * "** 
        - Va selectionner tous les elements.
**NB:** 
1. ***Selon le concepte du cascading style sheet, les valeurs des differentes propriété sont herités depuis les parents***
    - Exemple si on change la couleur de body: 
        -   ```
                body{
                    color : red;
                }
            ```
    Tous les enfants vont avoir cette propriété color  
2. ***le style sheet de CSS prend en compte la derniere regle qui s'applique à élement.*** 

    -   ```
            h1{
                color: red;
            }
            h1{
                color: green;
            }
        ```
    C'est la couleur green que sera pris en compte.
    **NB** Il prendra toujours la regle la plus **spécifique**, càd, celle qui sera par exemple nommer ***avec un id ou un class***
        -   ```
                .titre{
                    color: red;
                }
                h1{
                    color: green;
                }
            ```
        Dans ce cas ci, c'est la couleur red qui sera pris en compte.

##### Combinaison des selecteurs 

- Si par exemple on souhaite styliser des balise qui se trouve que dans d'autre pallise parent bien precis.
- ***Elle fonction aussi bien avec les "id" et les "class"***

1. Combinaison descendante [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Descendant_combinator)
    - Deux selecteurs separer par un **espace** 
        -   ```
                table h1 {
                    color: red;
                }
            ```
        - On cible tous les h1 qui on un parent que est une table 
        - **NB** ***Dans ce cas ci, on est aussi oplus spécifique!! c'est ce contenu qui sera pris en compte ***
    - ***NB: il est aussi possible d'avoir plusieur niveau de profondeur***

2. Combinaison des enfants direct 
    - Deux selecteurs separés par un **>**
3. Combinaison des voisin direct 
    - (Le voisin direct) Deux selecteurs separés par un **+**
    - (Tous les voisins direct) Deux selecteur séparés par un **~**

##### Les selecteurs d'attribut 

- [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Attribute_selectors)

- Permettent de selectionner un eelment par rapport à un des ses attributs
    - ``` 
        //Donne un style particulier à tous les liens qui ont un attribut titre

        a[titre] {
            ...
        }
        // Peut parmet de differencier les liens interne et les liens externes

        a[href^="http"]{
            ...
        }

        // Les elements ayant un fonction particuliere
        imput[type="text"]{
            ...
        }

      ```    
- Il est possible de mettre plusieur regles
    -   ```
            input[type="text"], input[type="mail"] {
                ...
            }
        ```

#### Les pseudo class

- [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Pseudo-classes)

- Permettent de donner un style à l'element lorsque l'on fait un action. 
    -   ```
            // Donner une couleur rouge à l'element lorsque on le survole avec la sourcis
            a {
                color : green;
            }
            a:hover{
                color: red;
            }
        ```
#### Le modele de boites

- La boite a plusieurs propriété. 
    - ***Si on ne precise rien en css la largeur est de 100% ( la totalité de l'espace disponible) et la hauteur va dependre du contenu.*** 

##### Comportement de la boite vis à vis des autres elements

[Doc display](https://developer.mozilla.org/fr/docs/Web/CSS/Display)

1. **display block** : 
    - Display par defaut,
    - Il prend la totalité de la largeur, 
    - Deux element ne peuvent pas etre l'un à cote de l'autre càd que l'element suivant va se situer en dessous
    - Peut avoir une largeur et une hauteur  que l'on peut precise manuellement 
2. **Le display inline**:
    - Le cadre prend par defaut la dimension du mot qu'il entoure
    - Certainnes balises sont par defaut en display inline. 
        - Si par exemple il y a un **span** au milieu d'un paragraphe il prendra par defaut la largeur et la hauteur du texte qui l'entoure 
        - On ne peut pas manuellement precises une largeur et une hauteur.
3. **Le display inline-block**:
    - Comportement en mi-chemin entre en ligne et block. 
    - Appliquer par defaut sur tout ce qui champs multitext
    - Il se comporte en in line mais on peut leur donner manuellement une hauteur et un largeur 

#### Police et Textes 

##### Les propriétes

1. **Color :** [Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Color) permet de definir la couleur de texte qui est utilisée.
    - Elle peut prendre differentes valeur globales
        1. **inherit** : Valeur utiliser par defaut par la plus part des elements càd que la couleur va etre hérité des ***elements parents***
        2. Dans la definition des propriétés de style de texte il possible de separée differentes propriétés avec une virgule pour au cas ou le na vigateur n'a pas la premier il regarde la suite et ainsi de suite.
        3. **word-wrap (overflow-wrap)** : permet de casse un mot trop long

##### Les unittes de mesure 

1. Les unites absolus 
    - Les pixel **px** : Representent un pixel sur notre ecran. elle donne une dimension fixe 

2. Les Unités relatives 
    - Les pourcentage **%**: Il va permettre à l'element de prendre le pourcentage de la dinsension definis. 
        - ***NB: cC'est le % par rapport a son contenneur et non par rapport à la taille de l'ecran***
        - Cella ne fonction pas de la meme maniere pour la hauteur car la hauteur depend du contenu
    - Le view port weight **vw** : qui represente le pourcentage de la largeur de la fenetre et pas par rapport à son contenu
    - Le view port height **vh** : qui represente le pourcentage de la hauteur  de la fenetre et pas par rapport à son contenu
    - le **vmin et vmax**: prenne la dimension la plus petite/grande entre la hauteur et la largeur et le chiffrsera le pourcentage de cette valleur là. 
    - le **em**: Permet de spécifier une taille par rapport à la taille de la police de notre element, ou de l'element parent (par exemple dans le cas d'espacement de paragraphe) 
    - **rem** : depend de la police qui est definis dans la racine ( par rapport à la taill de la police generale . parEx: si on a definis les boby a une taille de 20px, un 1.5rem sera de 30px )

#### Le positionement 
[Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Position)

1. **static** : par defaut tous les elements sont static 
2. **absolute** : permet de positionner un element de maniere absolu par rapport a un autre element. 
    - Il presente un comportement un peu particulier. 
    - Il va survoler les autres elements et est placer n'importe comment 
    - Il lorsqu'on definis une position absolute, il va de paire avec 4 autres propriété: 
        1. top
        2. left
        3. right
        4. bottom
        - ***Elle permettent de spécifier la position de l'element par raport à la fenettre.***
            - Si on veut le position tout en haut à gauche
            -   ```
                    .element{
                        position: absolute; 
                        top:0;
                        left: 0;
                    }
                ```
3. **fixed**: 
    - Meme comportement que l'absolute (elle survole ......) 
    - Elle garde la meme position au scroll de la page ( l'element est figé par raport à la fenetre et non par rapport son parent).
4. **relative**
    - Meme comportement que le position static.
    - Elle permet de precise un decalage en precisant par exemple: 
        - le top 
        - le left
        - le right
        - le Bottom
    - Ce decalage peut aussi prendre des valeur negatives
    - ***Un element qui est en position relative change le comportemant des enfants qui sont en position absolute. 
        - **L'element en osition absolute va se positionner par rapport au premier parent qui serait en relatif.** 
            - ***et si il y a aucun element parent en relatif, il va se positionner par raport au body***
            - ***de la meme maniere si un parent est en absolute aussi il servira de referent***
5. **sticky**: Permet a l'element de rester fixed jusqu'a ce qu'il quitte l'element parent.

6. **z-index**: 
    - C'est un axe invisible qui terminela profondeur.
    - Plus l'element a un z-index elevé, plus il va etre au premier plan
    - Permet de terminer quelle element se placera au dessus de l'autre lorsque les deux sont absolute 
    - Il fonctionne sur tout les elements qui ne sont pas static càd egalement les **relative**