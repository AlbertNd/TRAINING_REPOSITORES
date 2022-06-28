<?php

if (empty($_POST['titre']) || empty($_POST['contenu'])) {
    $regmessage = sprintf('Veuillez completer tous les champs');
}elseif(!isset($_POST['titre']) && !isset($_POST['contenu'])){
    $regmessageAlert = sprintf('Veuillez completer tous les champs');
}else {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $user_id = $_SESSION['LOGGED_ID'];
    $enregistrerPost = new connectionDataBase();
    $enregistrerPost->insertionPost($titre, $contenu, $user_id);
    $_SESSION['AJOUT_POST']=0;
}
