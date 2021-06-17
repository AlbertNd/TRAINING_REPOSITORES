<main class="container posts article">
    <div class="message status">
        Message de validation
    </div>
    <div class="message error">
        Erreur sur answer
    </div>
    <article>
        <img src="" alt="">
        <div class="infos">
            Nom du créateur
            <time datetime="">Date de création</time>
        </div>
        <!-- autorisation de supprimer ou mettre à jour -->
        <ul>
            <li><a href=""><i class="fas fa-quidditch"></i></a></li>
            <li><a href="" onclick="event.preventDefault(); document.getElementById('destroy').submit();"><i class="fas fa-minus"></i></a></li>
            <form id="destroy" action="" method="POST" style="display: none;">
                <!-- Champ CSRF -->
                <!-- Champ méthode delete -->
            </form>
        </ul>
        <!-- fin de l'autorisation -->
        <p>La question</p>
    </article>
    <form method="POST">
        <!-- Champ CSRF -->
        <textarea name="answer" placeholder="Ma réponse ..."></textarea>
        <input type="submit" value="Répondre">
    </form>
    <!-- $answers en boucle -->
    <div class="answer">
        <img src="" alt="">
        <div class="infos">
            Nom du créateur
            <time datetime="">Date de création</time>
        </div>
        <p>La réponse</p>
    </div>
    <!-- fin de la boucle -->
</main>
