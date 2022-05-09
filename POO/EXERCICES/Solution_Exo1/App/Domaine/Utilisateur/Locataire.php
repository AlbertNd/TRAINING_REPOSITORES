<?php

declare(strict_types=1);

namespace App\Domaine\Utilisateur;

use App\Domaine\Utilisateur\Utilisateur;

class Locataire extends Utilisateur
{
    public const STATUS = 'LOCATAIRE'; 

    public static $nombreLocataire = 0;

    public function __construct(string $nom, string $prenom, int $telephone, string $status=self::STATUS)
    {
        self::$nombreLocataire++;

        parent::__construct($nom,$prenom,$telephone,$status);
        parent::$nombreUtilisateur++;
    }
}
