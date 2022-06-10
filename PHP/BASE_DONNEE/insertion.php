<?php

try{
    $bd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','user','Albert10?', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}

$insertion = $bd ->prepare('INSERT INTO utilisateur (Nom, prenom, age) VALUE (:Nom, :prenom, :age )');
$insertion -> execute(
    [
        'Nom' => 'Mugisha',
        'prenom' => 'concorde',
        'age' => 31,
    ]
    )
    // gestion d'erreur 
    or die(print_r($db->errorInfo()));