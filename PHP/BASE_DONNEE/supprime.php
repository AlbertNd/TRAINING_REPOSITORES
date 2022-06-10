<?php

try{
    $bd =new PDO('mysql:host=localhost;dbname=blog;chars=utf8','user','Albert10?', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
    die('Erreur : '.$e->getMessage());
}

$suppInsert = $bd -> prepare('DELETE FROM utilisateur WHERE id = :id');
$suppInsert -> execute([
    'id' => 2,
])
// gestion d'erreur 
or die(print_r($db->errorInfo()));