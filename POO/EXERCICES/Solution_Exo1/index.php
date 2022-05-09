<?php

declare(strict_types=1);

spl_autoload_register(static function(string $fqcn){
    $path=str_replace('\\','/',$fqcn).'.php';
    require_once $path;
});

use App\Domaine\Utilisateur\Locataire;
use App\Domaine\Utilisateur\Proprietaire;
use App\Domaine\Utilisateur\Utilisateur;
use App\Domaine\Vehicule\Vehicule;
use App\Domaine\Vehicule\Camion;


$testL=new Proprietaire('Ndizeye','Albert','3646464','0958585');
$testL->setMatricule('Tillieux','Amandine','Locataire');
$test = new Camion($testL,812,'Rouge','34567');

var_dump($test);