
<?php foreach($affichAcc -> lireBD($_POST['email']) as $utilisateur){ ?>
    
	<div>
		<?php echo $utilisateur['nom'] .' et le prenom '. $utilisateur['prenom']?>
	</div>

<?php
}
?>
 