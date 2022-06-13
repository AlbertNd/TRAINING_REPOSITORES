<?php

if(empty($_POST['email']) || empty($_POST['password'])){
    $message = sprintf('Veuillez introduire vos informations de connection');
}elseif(isset($_POST['email']) || isset($_POST['password'])){
    if($_POST['email'] === 'Albert@gmail.com' 
    &&
    $_POST['password'] === 'Albert'){
        $_SESSION['LOGGED_USER'] = $_POST['email'];
    }else{
        $message = sprintf('Les information saisies ne sont pas correctes');
    }
}

?>