<main class="container auth">
    <div class="message status">
        Message de validation
    </div>
    <div class="message error">
        Erreur sur password_old
    </div>
    <div class="message error">
        Erreur sur password
    </div>
    <form method="POST" action="" novalidate>
        <!-- Champ CSRF -->
        <!-- Champ méthode PUT -->
        <input type="password" name="password_old" placeholder="Ancien mot de passe">
        <input type="password" name="password" placeholder="Nouveau mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Modifier">
    </form>
</main>
