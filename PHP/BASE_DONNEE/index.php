<?php 

require_once('connectionBD.php'); 

$data = new database(); 
foreach($data -> selectbd() as $data){
    echo $data['nom'];
};

?>




