<?php

declare(strict_types=1);

namespace App\Domaine\Vehicule;



abstract class Vehicule 
{
    
    private const STATUS_Loc = 'A louer';
    private const STATUS_Priv ='Véhicule privée';

    private  $utilisateur;
  
    private int $prix; 
    private string $couleur;
    private string $matricule; 
    private string $status;

    public static $nombreVehicule=0;

    public function __construct($utilisateur, int $prix, string $couleur, string $matricule, string $status=self::STATUS_Loc)
    {
        $this->utilisateur=$utilisateur;
       
        $this->prix=$prix;
        $this->couleur=$couleur;
        $this->matricule=$matricule;
        $this->status=$status;
    }
}

