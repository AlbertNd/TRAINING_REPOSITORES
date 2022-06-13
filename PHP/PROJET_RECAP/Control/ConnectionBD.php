<?php


try {
    $bd = new PDO('mysql:host=localhost;dbname=Formation;charset=utf8', 'user', 'Albert10?', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$utilisateurList = $bd->prepare('SELECT * FROM Utilisateur');
$utilisateurList->execute();
$utilisateur= $utilisateurList->fetchAll();


$connectionUtilisateur = $bd -> prepare('SELECT * FROM Utilisateur WHERE Email = :Email');
$connectionUtilisateur -> execute([
    'Email' => $_POST['email']
]);
$connectionU = $connectionUtilisateur ->fetchAll();