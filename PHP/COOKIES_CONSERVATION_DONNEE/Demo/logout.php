<?php   
session_start(); // Pour etre sur que l'on utilise la meme session
session_destroy(); //Destuction de la session 
header("location:/Demo/Home.php"); // redirection vers la page home.php apres la destruction 
exit();
?>