<?php

class connectBD
{
    private $mysqlPDO;
    
    public function __construct()
    {
        $this -> mysqlPDO = new PDO('mysql:host=localhost;dbname=Formation;charset=utf8','user', 'Albert10?', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    // Manipulation des tables 

    public function insertionBD($nom, $prenom, $email,$password){
        $insertion = $this -> mysqlPDO ->prepare('INSERT INTO Utilisateur (Nom, Prenom, Email, Password ) VALUE (:nom, :prenom, :email, :password )');
        $insertion -> execute(
                [
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'password' => $password
                ]
            )
            // gestion d'erreur 
            or die(print_r($insertion->errorInfo()))
            ;
            header("location:/index.php");
    }

    // Lecture des tables 

    public function tblUtilisateur($email){
        $bd = $this -> mysqlPDO -> prepare('SELECT * FROM Utilisateur WHERE Email = :email');
        $bd -> execute(
            ['email' => $email]
        );
        $result = $bd -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function relTblUtisateurPost(){
        $bd = $this -> mysqlPDO -> prepare('SELECT u.nom ,p.contenu, p.titre FROM Utilisateur u INNER JOIN Post p ON u.user_id = p.user_id');
        $bd -> execute();
        $result = $bd -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}








