<div class="container flex justify-center">
	<?php foreach ($affichAcc->lireBD($_POST['email']) as $utilisateur) { ?>

		<div>
			<?php echo 'Le nom du gars qui est connecté c\'est bien '.$utilisateur['nom'] . ' et le prenom ' . $utilisateur['prenom'] ?>
		</div>

	<?php
	}
	?>
</div>