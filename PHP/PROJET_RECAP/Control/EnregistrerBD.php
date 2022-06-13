<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=Formation;charset=utf8', 'user', 'Albert10?', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$insertion = $bd ->prepare('INSERT INTO Utilisateur (Nom, Prenom, Email, Password ) VALUE (:nom, :prenom, :email, :password )');

        $insertion -> execute(
                [
                    'nom' => $_POST['Nom'],
                    'prenom' => $_POST['Prenom'],
                    'email' => $_POST['Mail'],
                    'password' => $_POST['Password']
                ]
            )
            // gestion d'erreur 
            or die(print_r($db->errorInfo()))
            ;
            header("location:/index.php");