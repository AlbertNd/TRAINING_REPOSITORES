<?php

declare(strict_types=1);

spl_autoload_register(static function(string $fqcn){
    $path = str_replace('\\','/',$fqcn).'.php';
    require_once $path;
});

use App\Domaine\Utilisateur\Locataire;
use App\Domaine\Utilisateur\Proprietaire;
use App\Domaine\Utilisateur\Utilisateur;

$pro = new Proprietaire('Ndizeye','Albert','45678','09876');
$loc = new Locataire('tillieux','Amandine','09876','09879');

var_dump($pro,$loc);