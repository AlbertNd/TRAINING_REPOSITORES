<?php 

declare(strict_types=1);

namespace App\Domaine\Utilisateur;

abstract class Utilisateur
{
    private string $nom;
    private string $prenom; 
    private string $telephone; 
    private string $matricule; 

    public function __construct( string $nom, string $prenom, string $telephone, string $matricule)
    {
        $this->nom=$nom; 
        $this->prenom=$prenom; 
        $this->telephone=$telephone;
        $this->matricule=$matricule;
    }
}
