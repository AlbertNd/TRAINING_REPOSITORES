<?php

declare(strict_types=1);

namespace App\Domaine\Utilisateur;

use App\Domaine\Utilisateur\Utilisateur; 

class Proprietaire extends Utilisateur
{
    public const STATUS ='Proprietaire';
    public string $status;

    public static $nombreProprietaire = 0;

    Public function __construct(string $nom, string $prenom, string $telephone, $matricule , string $status=self::STATUS)
    {
        $this->status=$status;

        parent::__construct($nom,$prenom,$telephone,$status,$matricule);

        parent::$nombreUtilisateur++;
        self::$nombreProprietaire++;

    }
}

