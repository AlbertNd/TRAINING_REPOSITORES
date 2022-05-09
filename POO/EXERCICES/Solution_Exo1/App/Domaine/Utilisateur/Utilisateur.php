<?php

declare(strict_types=1);

namespace App\Domaine\Utilisateur;

 abstract class Utilisateur
{
    private string $nom;
    private string $prenom;
    private int $telephne; 
    private string $status;
    private string $matricule; 

    public static $nombreUtilisateur = 0;

    Public function __construct(string $nom, string $prenom, int $telephone, string $status)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->telephone=intval($telephone);
        $this->status=$status;

        // le matricule se copose de deux premiere lettres du non, deux premier du prenom , l'année de la date de création et les deux premiere lettres du status (le tout en majuscule)

        $this->matricule=strtoupper(substr($nom,0,2).substr($prenom,0,2).date('y').substr($status,0,2));

            
    }
    // les accesseurs et mutateurs des attributs 
    
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
        return $this->telephne;
    }

    public function setTelephone(int $telephone):void{
        $this->telephone=intval($telephone);
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
    public function setMatricule(string $nom, string $prenom, string $status):void{
        $this->matricule=strtoupper(substr($nom,0,2).substr($prenom,0,2).date('y').substr($status,0,2));
    }

}
