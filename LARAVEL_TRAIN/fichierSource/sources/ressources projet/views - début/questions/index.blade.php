<main class="container posts articles">
    <!-- $questions en boucle -->
    <article>
        <img src="" alt="">
        <p><a href="">La question</a></p>
        <!-- autorisation de supprimer ou mettre à jour -->
        <ul>
            <li><a href=""><i class="fas fa-quidditch"></i></a></li>
            <li><a href="" onclick="event.preventDefault(); document.getElementById('destroy1').submit();"><i class="fas fa-minus"></i></a></li>
            <form method="POST" id="destroy1" action="" style="display: none;">
                <!-- Champ CSRF -->
                <!-- Champ méthode delete -->
            </form>
        </ul>
        <!-- fin de l'autorisation -->
    </article>
    <!-- fin de la boucle -->
</main>
