<main class="container auth">
    <div class="message error">
        Erreur sur email
    </div>
    <div class="message error">
        Erreur sur password
    </div>
    <form method="POST" action="" novalidate>
        <!-- Champ CSRF -->
        <input type="hidden" name="token" value="">
        <input type="email" name="email" placeholder="Adresse e-mail" value="">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
        <input type="submit" value="Modifier">
    </form>
</main>
