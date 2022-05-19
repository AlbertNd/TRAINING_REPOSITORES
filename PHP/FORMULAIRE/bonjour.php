<?php if (empty($_POST['name']) || empty($_POST['message'])) : ?>
    <div>
        <h2>Il faut un non et un message pour soumetre le formulaire</h2>
        <button>
        <a href="./">retour</a>
        </button>
        
    </div>
<?php else : ?>
    <h1>Message bien recus</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Rappel des vos information</h5>
            <p class="card-text"><?php echo $_POST['name'] ?></p>
            <p class="card-text"><?php echo $_POST['message'] ?></p>

        </div>
    </div>
<?php endif; ?>