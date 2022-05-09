<?php

declare(strict_types=1);

namespace App\Domaine\Utilisateur;

abstract class Utilisateur
{
    private string $nom; 
    private string $prenom;
    private string $telephone; 
    private string $status;
    private string $matricule; 

    public static $nombreUtilisateur = 0;

    public function __construct(string $nom, string $prenom, string $telephone, string $status, string $matricule )
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->telephone=$telephone;
        $this->status=$status;
        $this->matricule= strtoupper(substr($nom,0,2).substr($prenom,0,2).date("y").substr($status,0,2)) ;

        self::$nombreUtilisateur++;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom(string $nom):void{
        $this->nom=$nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom(string $prenom):void{
        $this->prenom=$prenom;
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function setTelephone(string $telephone):void{
        $this->telephone=$telephone;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus(string $status):void{
        $this->status=$status;
    }
    public function getMatricule(){
        return $this->matricule;
    }
    public function setMatricule(string $nom , string $prenom, string $status):void{
        $this->matricule=strtoupper(substr($nom,0,2).substr($prenom,0,2).date("y").substr($status,0,2));
    }   
}

