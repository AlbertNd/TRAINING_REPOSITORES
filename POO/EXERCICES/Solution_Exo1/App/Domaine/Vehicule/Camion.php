<?php

declare(strict_types=1);

namespace App\Domaine\Vehicule;


use App\Domaine\Utilisateur\Locataire;
use App\Domaine\Vehicule\Vehicule;
use App\Domaine\Utilisateur\Utilisateur;

use function PHPSTORM_META\map;

class Camion extends Vehicule
{
    public string $nombreRoue;
    
    public static $nombreCamion =0;

    public function __construct(Utilisateur $utilisateur, int $prix, string $couleur, string $matricule)
    {
        $this->nombreRoue='6';
        self::$nombreCamion++;
        
        parent::__construct($utilisateur,$prix,$couleur,$matricule);
        parent::$nombreVehicule++;

    }
}

