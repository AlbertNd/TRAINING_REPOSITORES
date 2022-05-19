<?php
               
    if(!isset($_POST['name']) || !isset($_POST['message'])){
            echo 'Il faut un non et un message pour soumetre le formulaire';
        }
    else{
        echo'<h1>Message bien recus</h1>';
    }
            
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Rappel des vos information</h5>
        <p class="card-text"><?php echo $_POST['name']?></p>
        <p class="card-text"><?php echo $_POST['message']?></p>
        
    </div>
</div>

