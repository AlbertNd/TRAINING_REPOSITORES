<?php
//include('App/Model/ConnectionDataBase.php');

if (empty($_POST['editeTitre']) || empty($_POST['editeContenu'])) {
    $editeMessage = sprintf('Veuillez modifier les champs souhaités');
} else {

    $tritre = $_POST['editeTitre'];
    $contenu = $_POST['editeContenu'];
    $id = $_POST['idEdite'];

    $modificationPost = new connectionDataBase();
    $modificationPost->editePost($tritre, $contenu, $id);
    $_SESSION['EDIT_POST'] = 0;
}
