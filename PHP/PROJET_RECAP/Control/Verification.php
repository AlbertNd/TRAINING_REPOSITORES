<?php
require_once('Control/ConnectionBD.php');

$connectionU = new connectBD();

foreach ($connectionU -> tblUtilisateur($_POST['email']) as $utilisateur) {
    $email = $utilisateur['Email'];
    $pass = $utilisateur['password'];
    $prenom = $utilisateur['prenom'];
}

if (empty($_POST['email']) || empty($_POST['password'])) {
    $message = sprintf('Veuillez introduire vos informations de connection');
} elseif (isset($_POST['email']) || isset($_POST['password'])) {

    if (
        $_POST['email'] === $email
        &&
        $_POST['password'] === $pass
    ) {
        $_SESSION['LOGGED_USER'] = $prenom;
    } else {
        $message = sprintf('Les information saisies ne sont pas correctes');
    }
}
