<?php

declare(strict_types=1);

//Fonction autoload 

spl_autoload_register(static function (string $fqcn){
    $path = str_replace('\\','/',$fqcn).'.php';
    require_once $path;
}); 

use App\Domaine\Utilisateur\Locataire;
use App\Domaine\Utilisateur\Proprietaire;
use App\Domaine\Utilisateur\Utilisateur;
use App\Domaine\Vehicule\Vehicule;
use App\Domaine\Vehicule\Camion;
use App\Domaine\Vehicule\Voiture;

$testU= new Locataire('Ndizeye','Albert',12356468); 

$testC= new Voiture($testU,'IVECO',2023,'Rouge',6);

var_dump($testC);

echo 'Nombre véhicule : '.Vehicule::$nombreVehicule.' nombre camion : '.Camion::$nombreCamion.' nombre voiture : '.Voiture::$nombreVoiture;