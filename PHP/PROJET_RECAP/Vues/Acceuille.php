<div class="container flex justify-center">

	<div class="bold">
		Voila le site en question et dessous i y a ce qu eles visiteur connecter devront voir .


		<?php //if($_SESSION['LOGGED_USER']):
		?>
		<?php foreach ($affichAcc->tblUtilisateur($_POST['email']) as $utilisateur) { ?>
			<div>
				<?php echo 'Le nom du gars qui est connecté c\'est bien ' . $utilisateur['nom'] . ' et son prenom ' . $utilisateur['prenom'] ?>
			</div>

		<?php
		}
		?>
		<?php //endif; 
		?>
	</div>
</div>