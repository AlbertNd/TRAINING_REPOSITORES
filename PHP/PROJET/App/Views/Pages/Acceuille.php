<div class="mx-auto ">
    <div class="flex flex-wrap justify-center">
        <?php
        if ($_SESSION['AJOUT_POST'] === 1) {
            include('App/Views/Forms/enregistrePost.php');
        }
        ?>

        <?php
        if ($_SESSION['EDIT_POST'] === 1) {
            include('App/Views/Forms/edite.php');
        }
        ?>

        <?php
        if (isset($_POST['connecter'])) {
            include('App/Views/Forms/login.php');
        };
        ?>

<?php
        if (isset($_POST['enregistrerUt'])) {
            include('App/Views/Forms/enregistre.php');
        };
        ?>

        <?php include('cardspost.php'); ?>
    </div>
</div>