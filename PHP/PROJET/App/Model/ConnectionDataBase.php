<?php 

class connectionDataBase
{
    private $dataBase;
    
    public function __construct()
    {
        $this -> dataBase = new PDO('mysql:host=localhost;dbname=Projet;charset=utf8','user','Albert10?',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public function selectionDonneUtilisateuPost(){
        $selection = $this -> dataBase -> prepare('SELECT u.nom, u.prenom, p.titre, p.contenu, p.date FROM Utilisateur u INNER JOIN Post p WHERE u.user_id = p.user_id');
        $selection -> execute();
        $result = $selection -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertionUtilisateur($nom, $prenom, $mail, $pass){
        $insertion = $this -> dataBase -> prepare('INSERT INTO Utilisateur (nom, prenom, mail, pass) VALUE (:nom , :prenom, :mail, :pass)'); 

        $insertion -> execute([
            'nom' => $nom, 
            'prenom' => $prenom, 
            'mail' => $mail, 
            'pass' => $pass
        ]);

        header("location:/index.php");
    }

    public function authentification($mail){
        $authentification = $this -> dataBase -> prepare('SELECT * FROM Utilisateur WHERE mail = :mail');
        $authentification -> execute([
            'mail' => $mail,
        ]);
        $result = $authentification -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}