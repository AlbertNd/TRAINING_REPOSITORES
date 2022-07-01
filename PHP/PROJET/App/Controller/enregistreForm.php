<?php 


$nom = $_POST['regnom'];
$prenom = $_POST['regprenom'];
$mail = $_POST['regmail'];
$pass = $_POST['regpass'];

if(empty($nom)|| empty($prenom) || empty($mail) || empty($pass)){
    $regMessage = sprintf('Veuillez completer tous les champs');
}else{
    $enregistrerUtilisateur = new connectionDataBase(); 
    $enregistrerUtilisateur -> insertionUtilisateur($nom, $prenom, $mail, $pass); 
}

?>