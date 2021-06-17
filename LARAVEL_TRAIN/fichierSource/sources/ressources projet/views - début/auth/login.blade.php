<main class="container auth">
    <div class="message error">
        Erreur sur email
    </div>
    <div class="message error">
        Erreur sur password
    </div>
    <form method="POST" action="" novalidate>
        <!-- Champ CSRF -->
        <input type="email" name="email" placeholder="Adresse e-mail" value="">
        <input type="password" name="password" placeholder="Mot de passe">
        <div class="checkbox">
            <input type="checkbox" name="remember">Rester connecté
        </div>
        <input type="submit" value="Connexion">
    </form>
    <a href="">Mot de passe oublié</a>
</main>
