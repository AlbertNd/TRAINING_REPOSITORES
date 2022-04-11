# PROGRAMMATION ORIENTE OBJETS - VSCODE. 

## Configuration de vs code. 

1. #### Installation des extensions 
    - PHP Extension Pack 
        - PHP Intellisense
        - PHP Debug
    - PHP Server (Pour avoir un serveur local sans utiliser apache ou un autre serveur)
    - French Language Pack for Visual Studio Code ( Pour avoir le menu en fancais)
2. #### Création du dossier 
    - Ouvrir un dossier
        - Creation du fichier **(index.php)**

## La programmation orientée objet

1. #### Théorie de base 

    - ##### Objet et classe (Supposons que l'on sohaite modéliser une voiture.)
        - On aura une **Classe Voiture** : cette classe est le mode d'emploi et possède:
            - **Les propriétés**: Un ensemble de caracéristiques (un type de moteur, une vitesse maximale, une couleur, un nombre de portes, etc..)
            - **Les méthodes**: Un ensemble de fonctionnalité (Rouler, freiner, klaxonner,etc...).
            - **Les objet**: Les instances de la classe voiture (une voiture rouge, de type diesel possedant 3 portes ...)
    - ***NB: Chaque voiture est un objet, qui est differentes l'un de l'autre et à l'inverse de la classe qui est unique***
2. #### Instaciation d'une classe: 
    - PHP prose plusieurs classes par défaut, comme par exemple **DateTime** et pour utiliser la classe on l'appelle par son nom précédé du mot **new**
        -   ```
                <?php
                $date = new DateTime;
                (Instanciation de la classe DateTime)            
            ```
    - ***Créer une intance c'est créer un objet à partir d'une classe, et cette créeation est le résultat de trois opérations:*** 
        1. ***L'allocation et l'initialisation de données.***
        2. ***Le stockage en mémoire du nouvel objet pour suivre son état***
        3. ***La construction d'une référence de l'objet pour le manipuler*** 
            - **Notion de référence:** Lorsqu'on passe une variable en paramètre d'une fonction, PHP en fait une copie par défaut. Et lorsqu'on souhaite modifier la variable au sein de la fonction on ajoute le symbole **&** pour indiquer au langage de ne pas copier la valeur dans la fonction mais plutot de manipuler directement la variable d'origine.
                -   ```
                        <?php

                            // déclaration par référence avec le symbole &
                            function foo($var) {
                                $var = 2;
                            }


                            $a=1;
                            foo ($a);
                            // $a vaut toujours 1
                    ```
                -   ```
                        <?php

                            // déclaration par référence avec le symbole &
                            function foo(&$var) {
                                $var = 2;
                            }
                            
                            $a=1;
                            foo ($a);
                            
                            // $a vaut 2 maintenant
                    ```
3. #### Utilisation des fonctionnalités d'un objet
    - Les objets possèdent des propriétés (variables) et des methodes (fonctions). pour y accéder, on utilise le symbole **->** à la suite de la variable.
         
## La pratique 

1. #### Création d'une classe: 
    -   
        ```
            class NomDeLaClasse
            {

            }
        ```
2. #### Instanciation de la classe
    - 
        ```
            class Voiture
            {

            }
            $voiture = new Voiture;
        ```
3. #### Ajout et accé aux propriétés
    - Ajout d'une propriété définissant la longueur de la voiture 
        - 
        ```
                declare(strict_types=1);
                class Voiture
                {
                    public float $longeur = 0 ;
                }
                $voiture = new Voiture;
                $voiture->longeur = 3.5;
                var_dump($voiture);

        ```
        - La déclaration de la propriété se compose:
        1. plublic: permet de définir l'accessibilité de la propriété
        2. float : type de la propriété
        3. Nom de la propriété prefixé du symnole **$** (pour distingue la propriété de la constante)
        - L'interet de declarer les propriétés (declare(strict_types=1)) est celle de pouvoir les **typer** c'est à dire, garantir qu'elles contiennent bien la valeur attendue.(PHP sera exigeant avec le typage)
        - Le mot **declare** permet d'indiquer à PHP un comportement spécifique pour le fichier dans lequel nous nous trouvons

4. #### Ajout des methodes
    - Calcule de la surface de la voiture 
        -   ```
                declare(strict_types=1);
                class Voiture
                {
                    public float $longueur;
                    public float $largueur;
                }
                $voiture = new Voiture;
                $voiture->longueur= 3.3;
                $voiture->largeur=1.8;
                $surface = $voiture->longueur * $voiture->largeur;
                var_dump($surface)
            ```
        -   Pour éviter d'avoir à faire le calcul de la surface plusieurs fois, on peut utiliser une fonction dédier à cette tache. Cette fonction est une **méthode**
        -   ```
                declare (strict_types=1);
                class Voiture
                {
                    public float $longueur;
                    public float $largeur;
                    public function getSurface():float
                    {
                        return $this->longueur * $this->largeur;
                    }
                }
                $voiture = new Voiture;
                $voiture->longueur=2.3;
                $voiture->largeur=1.2;
                $surface=$voiture->getSurface();
                var_dump($surface);
            ```
5. #### Concervation de l'API (Application programming interface) public des objets
    - Admettons une classe avec 33 méthodes (j'exagère volontairement), mais dont une seule est vraiment nécessaire pour utiliser l'objet. Les autres méthodes sont utilisées par celle que vous devez appeler. 
    ***Comment simplifier l'usage de cet objet ?***
    1. Définir le domaine **public** des classes 
        - Toutes les méthodes et propriétés que l'on veut garder accessible au niveau de l'objet et que l'on va utiliser en dehors des méthodes de la classe elle meme, doivent etre préfixées du mot clé **public**
    2. Définir le domaine **private** des classes
        - Si nous avons besoin d'ajouter une propriété ou une méthode qui ne servira qu'au sein de la classe (et pas à l'extérieur), il faut la préfixer du mot-clé **private**. 
            -   ```
                Supposons que l'on souhaite faire une calcul de mesure et que la fonction souhaiter doit retourne un nombre avec "m²". 
                on peut le mettre en propriété prive dans la classe. 
                    declare(strict_types=1);
                    class Voiture
                    {
                    // $unite ne sert que dans la classe, on met cette propriété en privé.
                    private string $unite = 'm²';
                    
                    public float $longueur;
                    public float $largeur;
                    
                    public function getSurface(): string
                    {
                        return ($this->longueur * $this->largeur) . $this->unite; // on renvoie l’unité en plus de la surface
                    }}
                    $voiture = new Pont;
                    $voiture->longueur = 286.0;
                    $voiture->largeur = 15.0;
                    echo $voiture->getSurface();
                ```
6. #### L'acceès aux propriétés privées et principe de l'encapsulation 

    - **Note** Dès que l'on verouille des accès, on rentre dans le principe de l'encapsulation. on n'enferme les données dans l'objet et on va devoir créer une **methode public (une fonction)** appellé **setLonguer** pour les modifiers
        -   ```
            declare(strict_types=1);
            class Voiture
            {
                private const TEXT = 'voila %dm²';
                private float $longueur;
                private float $largeur;

                public function setLongueur(float $longueur):void{
                    if($longueur < 0){
                        trigger_error('la valeur doit etre plus grand que 0',
                        E_USER_ERROR);
                    }
                    $this->longueur = $longueur;
                }
                public function getLongueur():float{
                    return $this->longueur;
                }
                public function setLargeur(float $largeur):void{
                    if($largeur < 0){
                        trigger_error('la aleur doit etre plus grand que 0', 
                        E_USER_ERROR);
                    }
                    $this->largeur=$largeur;
                }
                public function getLargeur():float{
                    return $this->largeur;
                }
                public function getSurface():float{
                    return $this->longueur * $this->largeur;
                }
                public function printSurface():void{
                    echo sprintf(self::TEXT,$this->getSurface());
                }
            }
            $voiture = new Voiture; 
            $voiture -> setLongueur(4.3);
            $voiture -> setLargeur(2.3);
            $voiture->printSurface();

            ```   
7. #### Propriétés et méthodes statiques
    - On appelle propriétés et méthodes statiques les propriétés et les méthodes qui se **rapportent à une classe** , c à d, les méthodes et propriétés **communes à tous les objets** 
    (*Contrairement aux méthodes et propriétés vu plus haut et qui se rapporte à un objet*)
    - ***Parfois la cration d'une instance n'est pas necessaire. pour utiliser une méthode sans instance, elle doit etre declarée statique***
    Lorsqu'une propriété est declarée statique, la valeur qu'elle contient est partagée pour toutes les instances.
    -   ```
        declare (strict_types=1);
        class Voiture{
            public static function validerTaille(float $taille):bool
            {
                if($taille < 50){
                    trigger_error(
                        'la longueur est trop courte min 50',
                        E_USER_ERROR
                    );
                }
                return true;
            }
        }
        var_dump(Voiture :: validerTaille(150.0));
        var_dump(voiture:: validerTaille(20.0));
        ```
    - Pour dir à PHP que nous souhaitons acceder à un element de la classe et nom de l'objet on utilise **::** vomme pour les constantes.
    - Pour cible une méthode statique de la classe on utilise le mot clef **self** et non $this.
    -   ```
        declare(strict_types = 1);
        class Voiture
        {
            public static function validerTaille(float $taille):bool{
                if($taille <50){
                    trigger_error('la taille est trop petite', 
                    E_USER_ERROR);
                }
                return true ;
            }
            public function setLongueur(float $longueur):void{
                self::validerTaille($longueur);
                $this->longueur=$longueur;
            }
        }
        $voiture= new Voiture;
        $voiture->setLongueur(20.0);
        ``` 
    - Les méthodes statiques sont particulierement utiles pour réaliser des vérifications ou des calcules sans effet sur l'objet. 
    Imaginons que nous souhaitons compter le nombre de personnes ayant une voiture, peu importe la voiture, sur toutes les instance confondues (***On va pas s'amuser à additionner la valeur d'une propriété de chacune des instances***).
    -   ```
        declare (strict_types=1);
        class Voiture
        {
            // définition de la propriété statique qui sera partagée
            public static int $nombreProprio = 0;

            // je laisse volontairement la méthode non statique
            // seule la référence à la propriété est importante.
            public function nouveauProprio(){
                self::$nombreProprio++;
            }
        }
        $voitureA = new Voiture;
        $voitureA->nouveauProprio();
        $voitureB = new Voiture;
        $voitureB->nouveauProprio();

        echo Voiture::$nombreProprio;
        ```
8. #### Utilisation des valeurs immuables (Constantes)
    - On peut avoir besoin d'une propriété statique immuable, càd qui ne change pas. 
    comme par exemple une unite de mesure qui s'exprimera toujours en m² (***Cette unité de mesure ne sera jamais modifier au cours de l'execution du programme***). on passer cette propriété en constante avec le mot clef **const**
    -   ```
        declare(strict_types=1);
        class Voiture
        {
        private const UNITE = ‘m²’;
        private float $longueur;
        private float $largeur;
        
        public function getSurface(): string
        {
            return ($this->longueur * $this->largeur) . self::UNITE;
        }
        // setLongueur et setLargeur ne changent pas
        }
        $voiture = new Pont;
        $voiture->setLongueur(286.0);
        $voiture->setLargeur(15.0);
        echo $voiture->getSurface();
        ```
9. #### Exploitation des méthodes communes aux objets (Méthode __construct et __destruct)
    - [Documentation des méthode PHP](https://www.php.net/manual/fr/language.oop5.magic.php)
    - **__construct**: C'est une méthode qui est appelée automatiquement lorsque on crée une instance avec le mot clef ***new*** on l'appelle le **constructeur**. dansla majeur partie du temps, le constructeur sert à initialiser les données de départ pour l'objet.
    - **__destruct**:  c'est une méthode qui est appellé automatiquement lorsque l'objet est supprimer de la memoire.ce qui est fait à chaque fois que le script est terminée.
    Il existe deux autres moyens de le déclencher manuellement : en supprimant l’objet avec **unset**  ou en remplaçant le contenu de la variable qui y fait référence. Pour faire simple, dès que PHP détecte que plus rien ne fait référence à un objet en mémoire, il le détruit, et donc déclenche  **__destruct**
    - Avec le contructeur, il est possible d'assignes les valeur des propriétés dés la creation de l'instance de la classe. 
    Pour donner des arguments au constructeur, on ajoute un parenthese derriere le nom de la classe comme si il s'agissait d'une méthode.
        -   ```

            declare(strict_types=1);
            class Voiture
            {
                private float $Longueur;
                private float $Largeur; 

                public function __construct( float $Longeur, float $Largeur){
                    $this->Longueur=$Longueur;
                    $this->Largeur=$Largeur;
                }
                public function getSurface(){
                    return $this->Longueur * $this->Largeur;
                }
                public function getAffiche(){
                    echo $this->getSurface();
                }
            }
            $voiture = new Voiture(4,2);
            $voiture->getAffiche();
            ```
    - **NB** : Depuis PHP8 il possible de racourcir le script, en précisant la visibilité directement au niveau des arguments du constructeur.
    On peut ne pas déclarer les propriétés et leur assignation
    ``` 
        declare(strict_types=1);
        class Voiture
        {
            public function __construct(float $Longueur,float $Largeur)
            {
            }
        }
        
        $voiture = new Voiture(4,2);
        var_dump($voiture);
    ```

    