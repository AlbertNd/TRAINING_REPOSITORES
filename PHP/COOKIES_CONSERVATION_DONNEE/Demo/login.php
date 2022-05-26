
<?php
if (empty($_POST['email']) || empty($_POST['password'])) {
    $message = sprintf('Veuilez mettre les infos de connexion');
} elseif (isset($_POST['email']) || isset($_POST['password'])) {
    if (
        $_POST['email'] === 'albert@gmail.com'
        &&
        $_POST['password'] === 'albert'
    ) {
        // Enregistrement de l'email de l'utilisateur en session 
        
        $_SESSION['LOGGED_USER'] = $_POST['email'];
    } else {
        $message = sprintf('Les infos introduis ne sont pas bonne');
    }
}
?>

<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <form action="Home.php" method="POST">
        <?php if (!isset($loggedUser)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Email address</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
<?php else : ?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['LOGGED_USER'] . ' bienvenue' ?>
    </div>
<?php endif; ?>