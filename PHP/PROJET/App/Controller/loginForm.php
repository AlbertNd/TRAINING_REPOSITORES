<?php 
// recuperation des champs de formulaire login

$mail = $_POST['mail']; 
$pass = $_POST['pass'];

// recuperation des donnée de connection 

foreach($connectionBaseDonne -> authentification($mail) as $donnee){
    $email = $donnee['mail'];
    $motPass = $donnee['pass'];
    $status = $donnee['status'];
    $prenom = $donnee['prenom'];
}

// verification du remplissage des champs
if(empty($_POST['mail']) || empty('pass')){
    $message = sprintf('Veuillez introduire vos informations de connection');

// verifcation de l'existance des variables 
}elseif(isset($_POST['mail']) || isset($_POST['pass'])){
    if( $email === $mail && $motPass === $pass){
        $_SESSION['LOGGED_USER'] = $prenom;
    }else {
        $message = sprintf('Les information de connection ne sont pas correcte');
    }
}