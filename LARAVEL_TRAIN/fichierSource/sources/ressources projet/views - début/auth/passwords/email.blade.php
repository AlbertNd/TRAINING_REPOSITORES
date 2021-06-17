<main class="container auth">
    <div class="message status">
        Message de validation
    </div>
    <div class="message error">
        Erreur sur email
    </div>
    <form method="POST" action="" novalidate>
        <!-- Champ CSRF -->
        <input type="email" name="email" placeholder="Adresse e-mail" value="">
        <input type="submit" value="Envoyer">
    </form>
</main>
