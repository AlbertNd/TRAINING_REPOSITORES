<?php
try {
    $bd = new PDO('mysql:host=localhost;dbname=Formation;charset=utf8', 'user', 'Albert10?', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$connectionUtilisateur = $bd->prepare('SELECT * FROM Utilisateur WHERE Email = :Email');
$connectionUtilisateur->execute([
    'Email' => $_POST['email']
]);
$connectionU = $connectionUtilisateur->fetchAll();

foreach ($connectionU as $utilisateur) {
    $email = $utilisateur['Email'];
    $pass = $utilisateur['Password'];
    $prenom = $utilisateur['Prenom'];
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
