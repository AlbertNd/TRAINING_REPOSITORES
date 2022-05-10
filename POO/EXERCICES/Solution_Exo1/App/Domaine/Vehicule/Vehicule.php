<?php

declare(strict_types=1);

namespace App\Domaine\Vehicule;


use App\domaine\Utilisateur\Proprietaire;
use App\Domaine\Utilisateur\Utilisateur; 

abstract class Vehicule
{
    public $utilisateur;
    private string $marque; 
    private int $annee; 
    private string $couleur; 
    private int $nombreRoue; 
    private string $matricule; 

    public static $nombreVehicule = 0; 

    public function __construct(Utilisateur $utilisateur, string $marque,int $annee, string $couleur, int $nombreRoue)
    {
        $this->utilisateur=$utilisateur;
        $this->marque=$marque;
        $this->annee=intval($annee);
        $this->couleur=$couleur;
        $this->nombreRoue=intval($nombreRoue);
        $this->matricule=strtoupper(substr($marque,0,3).$annee.substr($couleur,0,2));
    }

    /**
     * Get the value of marque
     */ 
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get the value of annee
     */ 
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */ 
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get the value of couleur
     */ 
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */ 
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of nombreRoue
     */ 
    public function getNombreRoue()
    {
        return $this->nombreRoue;
    }

    /**
     * Set the value of nombreRoue
     *
     * @return  self
     */ 
    public function setNombreRoue($nombreRoue)
    {
        $this->nombreRoue = $nombreRoue;

        return $this;
    }

    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule(string $marque, int $annee, string $couleur)
    {
        $this->matricule = strtoupper(substr($marque,0,3).$annee.substr($couleur,0,2));

        return $this;
    }
}

