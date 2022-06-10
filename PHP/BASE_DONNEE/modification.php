<?php

try{
    $bd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','user','Albert10?', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$modifInsert = $bd -> prepare('UPDATE utilisateur SET Nom = :nom, prenom = :prenom WHERE id = :id');
$modifInsert -> execute(
    [
        'nom' =>'Bahibigwi',
        'prenom' => 'Brave', 
        'id' => 4,
    ]
)
// gestion d'erreur 
or die(print_r($db->errorInfo()));