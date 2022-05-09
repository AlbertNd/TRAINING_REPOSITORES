<?php

declare(strict_types=1);

namespace App\domaine\Utilisateur;

use App\Domaine\Utilisateur\Utilisateur;

class Proprietaire extends Utilisateur
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


