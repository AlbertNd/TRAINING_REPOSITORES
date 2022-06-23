<?php

require_once('connectionBD.php');

$data = new database();
foreach ($data->relationDb() as $data) {
?>
    <ul>
        <li>
            <div>
            <?php echo $data['nom']; ?>
            </div>
            <?php echo $data['contenu']; ?>
            
        </li>
    </ul>

<?php
};

?>