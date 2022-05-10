<?php

declare(strict_types=1);

namespace App\Domaine\Vehicule;


class Voiture extends Vehicule

{
    public const STATUS = 'Voiture'; 


    public static $nombreVoiture = 0; 

    public function __construct($utilisateur, string $marque,int $annee, string $couleur, int $nombreRoue)
    {
        $this->status=self::STATUS;
        
        self::$nombreVoiture++;

        parent::__construct($utilisateur,$marque,$annee,$couleur,$nombreRoue);
        parent::$nombreVehicule++;
    }

}