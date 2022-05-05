<?php

declare(strict_types=1);

namespace App\Domaine\Utilisateur;

use App\Domaine\Utilisateur\Utilisateur;

class Locataire extends Utilisateur
{
    public const STATUS ='Locataire'; 
    public $status;

    public function __construct(string $nom, string $prenom, string $telephone, string $matricule, string $status=self::STATUS)
    {
        parent::__construct($nom,$prenom,$telephone,$matricule);
        $this->status=$status;
    }
}

