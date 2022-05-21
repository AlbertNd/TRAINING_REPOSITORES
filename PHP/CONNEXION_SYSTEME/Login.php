<?php
if (empty($_POST['email']) || empty($_POST['password'])) {
    $message = sprintf('Veuillez introduire les information de connexion');
} elseif (isset($_POST['email']) || isset($_POST['password'])) {
    if (
        $_POST['email'] === 'Albert@gmail.com' &&
        $_POST['password'] === 'Ndizeye'
    ) {
        $loggedUser = [
            'email' => $_POST['email']
        ];
    } else {
        $message = sprintf('Les informations de connexion ne sont pas bonnes');
    };
}
?>

<?php if (!isset($loggedUser)) : ?>
    <form action="Home.php" method="POST">
        <?php if (isset($message)) : ?>
            <div class="mb-3">
                <?php echo $message ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de pass</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-ptimary mb-3">Connecter</button>
    </form>

<?php else: ?>
    <div>
        <h2>
            <?php echo 'Vous etes connecté en tant que ' . $_POST['email']; ?>
        </h2>
    </div>
<?php endif; ?>