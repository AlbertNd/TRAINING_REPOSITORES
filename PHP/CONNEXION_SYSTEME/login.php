<?php
//validation du formulaire 
if (empty($_POST['email']) || empty($_POST['password'])) {
    $errorMessage = sprintf('Veuillez introduire vos information de connexion');
} elseif (isset($_POST['email']) || isset($_POST['password'])) {

    if (
        $_POST['email'] === "Albert" &&
        $_POST['password'] === "Ndizeye"
    ) {
        $loggedUser = [
            'email' => $_POST['email'],
        ];
    } else {
        $errorMessage = sprintf('Les information ne sont pas bon :', $_POST['email'], $_POST['password']);
    };
}
?>

<?php if (!isset($loggedUser)) : ?>
    <form action="home.php" method="POST">


        <?php if (isset($errorMessage)) : ?>
            <H1>
                <?php echo $errorMessage; ?>
            </H1>
        <?php endif; ?>

        <label for="email">Email</label>
        <input type="text" name="email" id="">
        <label for="password">passxord</label>
        <input type="password" name="password" id="">
        <button type="submit">Envoyer</button>

    </form>

<?php else : ?>
    <h1>
        <?php echo $loggedUser['email']; ?> bienvenu
    </h1>
<?php endif; ?>