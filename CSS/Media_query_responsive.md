# Media query et responsive

[Doc](https://developer.mozilla.org/fr/docs/Web/CSS/Media_Queries/Using_media_queries)

#### Concept

1. Choisir le type de media que l'on souhaite supporter. 
    1. all  
    2. print
    3. **screen**
    4. speech 
2. Conditions sur les caracteristiques du media 
    - **largeur**
    - hauteur 
    - la resoluion 
    - orientation 
    - ...... voir doc
3. Les opérateurs logiques 
    - and
    - not
    - only
    - virgule
    **Permet de combiner plusiseur regles entre elle** 

#### Synthaxe

1. @media 
2. Condition 

```
// Les regles s'applique pour ecran 
 @media screen(...)
// Les regles s'applique ecran ou imprimente 
 @media , print(...)

```

##### cibler des caracteristique 

- Pour une largeur inferieur a 12450px 
    - `@media screen and (max-weight: 12450px) (...)`


#### Le pricipe. 

- Via l'inspecteur du navigateur et sortir les regles, celle ci permet de voir les dimensions de la page. 
    1. Dans les paramettre de l'ispecteur => elements => afficher les regles au passage du curseur
    2. En haut à droite, le trois petits points
        - Afficher les requetes media 
        - Afficher les regles

- Esseyer de trouver la **largeur** pour lequelle il y a un comportement non desirer.
-   ```
        @media screen and (max-weight: lageur_coportement){
            tous ce qui sera visible que si la condition et respecter 
        }
    ```
    exemple: 
    ```
        @media screen and (width: 1450px){
            .body{
                display: block;
            }
            .selecteur{
                width: 100%;
            }
        }
    ```