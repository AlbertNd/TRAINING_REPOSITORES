<?php

try {
	$db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','user','Albert10?', [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){

	die('Erreur : '.$e->getMessage());
}

$declarationDb = $db -> prepare("SELECT*FROM utilisateur WHERE Nom = ?");
$declarationDb -> execute(
	[
		'Bahibigwi'
	])// gestion d'erreur 
	or die(print_r($db->errorInfo()));
	
$nom = $declarationDb -> fetchAll(); 

foreach($nom as $nom){
	?>
	<div>
		<?php echo $nom['Nom'] .' et le prenom '. $nom['prenom']?>
	</div>
<?php
}
?>