<?php


function connectionDB(){
    try {
        $bd = new PDO('mysql:host=localhost;dbname=Formation;charset=utf8', 'user', 'Albert10?', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $bd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


function lireDonne()
{

    $connectionUtilisateur = connectionDB()->prepare('SELECT * FROM Utilisateur WHERE Email = :Email');
    $connectionUtilisateur->execute([
        'Email' => $_POST['email']
    ]);
    $connectionU = $connectionUtilisateur->fetchAll();
    return $connectionU;
}

$utilisateurList = $bd->prepare('SELECT * FROM Utilisateur');
$utilisateurList->execute();
$utilisateur = $utilisateurList->fetchAll();


