<?php

declare(strict_types=1);

namespace App\Domaine\Vehicule;


use App\domaine\Utilisateur\Proprietaire;
use App\Domaine\Utilisateur\Utilisateur; 

class Vehicule
{
    public $utilisateur;
    private string $marque; 
    private int $annee; 
    private string $couleur; 
    private int $nombreRoue; 
    private string $status;
    private string $matricule; 

    public static $nombreVehicule = 0; 

    public function __construct(Utilisateur $utilisateur, string $marque,int $annee, string $couleur, int $nombreRoue, string $status, string $matricule)
    {
        $this->utilisateur=$utilisateur;
        $this->marque=$marque;
        $this->annee=intval($annee);
        $this->couleur=$couleur;
        $this->nombreRoue=intval($nombreRoue);
        $this->status=$status;
        $this->matricule=$matricule;
    }
}

