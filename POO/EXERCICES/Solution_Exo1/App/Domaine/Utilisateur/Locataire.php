<?php

declare(strict_types=1); 

namespace App\Domaine\Utilisateur;

require_once('Utilisateur.php');

use App\Domaine\Utilisateur\Utilisateur; 

class Locataire extends Utilisateur
{
    public const STATUS = 'Locataire'; 
    public string $status;

    Public static $nombreLocataire = 0;

    public function __construct(string $nom, string $prenom, string $telephone, string $matricule , string $status=self::STATUS)
    {
        $this->status=$status;
        self::$nombreLocataire++;


        parent::__construct($nom,$prenom,$telephone,$status,$matricule);
        parent::$nombreUtilisateur++;
    }
}

