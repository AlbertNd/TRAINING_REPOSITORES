<?php
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $errorMessage = sprintf('Veuillez introduire vos informations de connexion');
    } elseif (isset($_POST['email']) || isset($_POST['password'])) {

        if (
            $_POST['email'] === "Albert" &&
            $_POST['password'] === "Ndizeye"
        ) {
            $loggedUser = [
                'email' => $_POST['email'],
            ];
        } else {
            $errorMessage = sprintf('Les information ne sont pas bon');
        };
    }
    ?>