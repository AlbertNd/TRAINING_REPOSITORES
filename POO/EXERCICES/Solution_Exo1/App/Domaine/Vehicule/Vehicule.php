<?php

declare(strict_types=1);

namespace App\Domaine\Vehicule;

use App\Domaine\Utilisateur\Utilisateur;

class Vehicule
{
    public string $marque; 
    public $conducteur;

    public function __construct( Utilisateur $conducteur, string $marque )
    {
        $this->conducteur=$conducteur;
        $this->marque=$marque;
    }
}