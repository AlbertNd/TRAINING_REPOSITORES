<?php

declare(strict_types=1);

namespace App\domaine\Utilisateur;

require_once('Utilisateur.php');

use App\Domaine\Utilisateur\Utilisateur;

class Propriétaire extends Utilisateur
{
    public const STATUS = 'PROPRIETAIRE'; 
    
    public static $nombrePropriataire = 0; 

    public function __construct(string $nom, string $prenom, int $telephone,string $status=self::STATUS)
    {
        
        self::$nombrePropriataire++;

        parent::__construct($nom,$prenom,$telephone,$status);
        parent::$nombreUtilisateur++;
    }
    
}

$test = new Propriétaire('Ndizeye','Albert',123654);
$test->setStatus('BLABLABAL');

var_dump($test);

