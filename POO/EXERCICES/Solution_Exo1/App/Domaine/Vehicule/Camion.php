<?php 
declare(strict_types=1);

namespace App\Domaine\Vehicule;


class Camion extends Vehicule

{
    public const STATUS = 'CAMION'; 


    public static $nombreCamion = 0; 

    public function __construct($utilisateur, string $marque,int $annee, string $couleur, int $nombreRoue)
    {
        $this->status=self::STATUS; 
        self::$nombreCamion++;

        parent::__construct($utilisateur,$marque,$annee,$couleur,$nombreRoue);
        parent::$nombreVehicule++;
    }

}