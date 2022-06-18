<?php 
require_once('ConnectionBD.php');
$enregistre = new connectBD();
$Nom = $_POST['Nom'];
$Prenom = $_POST['Prenom'];
$Mail = $_POST['Mail'];
$Password = $_POST['Password'];
$enregistre -> insertionBD($Nom,$Prenom,$Mail,$Password);
?>