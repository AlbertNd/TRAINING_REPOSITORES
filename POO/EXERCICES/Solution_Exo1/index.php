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

$testP = new Proprietaire('Ndizeye','Albert',123652);
$testV = new Vehicule($testP,'IVECO',2022,'rouge',4,'Location','4568');

var_dump($testV);