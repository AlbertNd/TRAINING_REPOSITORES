# Solution énoncés

1. #### Etape
```
    <?php
    declare(strict_types=1);
    class Voiture
    {
        private string $unite='m²';
        public string $Couleur; 
        public float $Longueur;
        public float $Largeur; 

        public function getSurface():string{
            return ($this->Longueur * $this->Largeur)." ".$this->unite;
        }
        public function getAffiche(){
            echo "La surface de la voiture ".$this->Couleur." est de : ". $this->getSurface()."\n";
        }
    }
    $voitureA= new Voiture;
    $voitureA->Couleur='rouge';
    $voitureA->Longueur=4;
    $voitureA->Largeur=2;
    $voitureB= new Voiture;
    $voitureB->Couleur='verte';
    $voitureB->Longueur=5;
    $voitureB->Largeur=3;
    $voitureA->getAffiche();
    $voitureB->getAffiche();
```
2. #### Etape ( Les propriétés privés )

```
    <?php
    declare(strict_types=1);
    class Voiture
    {
        private const UNIT = 'm²';
        private float $Longueur;
        private float $Largeur; 
        private string $Couleur;

        // setLonguer
        public function setLongueur(float $Longueur):void{
            if($Longueur <0){
                trigger_error('la valeur de la longeur ne peus pas etre negative', E_USER_ERROR);
            }
            $this->Longueur=$Longueur;
        }
        // getLongeur
        public function getLongueur():float{
            return $this->Longueur;
        }
        // setLargeur
        public function setLargeur(float $Largeur):void{
            if($Largeur <0){
                trigger_error('la valeur de la largeur ne peus pas etre negative', E_USER_ERROR);
            }
            $this->Largeur=$Largeur;
        }
        // getLargeur
        public function getLargeur():float{
            return $this->Largeur;
        }
        // setCouleur
        public function setCouleur(string $Couleur):void{
            $this->Couleur=$Couleur;
        }
        // getCouleur
        public function getCouleur():string{
            return $this->Couleur;
        }

        // getSurface
        public function getSurface():float{
            return $this->Longueur * $this->Largeur;
        }

        // l'affichage
        public function getAffiche(){
            echo "La voiture de couleur ".$this->getCouleur()." a une surface de : ".$this->getSurface()." ".self::UNIT."\n";
        }   
    }

    $voitureA= new Voiture;
        $voitureA->setCouleur('rouge');
        $voitureA->setLongueur(4);
        $voitureA->setLargeur(2);
        $voitureB= new Voiture;
        $voitureB->setCouleur('verte');
        $voitureB->setLongueur(5);
        $voitureB->setLargeur(3);
        $voitureA->getAffiche();
        $voitureB->getAffiche();
```
3. #### Etape (Les propriétés statiques)

```
    <?php
    declare(strict_types=1);
    class Voiture 
    {
        private float $Longueur;
        private float $Largeur; 
        public static function evaluationMesure(float $mesure):bool{
            if($mesure < 20){
                trigger_error("la mesure de la longueur et de la largeur doit etre plus grand que 20 m ",E_USER_ERROR);
            }
            return true;
        }
        public function setLongueur(float $Longueur):void{
            self::evaluationMesure($Longueur);
            $this->Longueur=$Longueur;
        }
        public function getLongueur(){
            return $this->Longueur;
        }
        public function setLargeur(float $Largeur):void{
            self::evaluationMesure($Largeur);
            $this->Largeur=$Largeur;
        }
        public function getLargeur(){
            return $this->Largeur;
        }
        public function getSurface():float{
            return $this->Longueur * $this->Largeur;
        }
        public function getAffiche(){
            echo 'La surface est de : '.$this-> getSurface()." m²";
        }
    }
    $voitureA= new Voiture;
    $voitureA->setLongueur(2);
    $voitureA->setLargeur(4);
    $voitureA->getAffiche();

```