<?php

require_once('connectionBD.php');

$data = new database();
foreach ($data->selectbd('Post') as $data) {
?>
    <ul>
        <li>
            <?php echo $data['contenu']; ?>
        </li>
    </ul>

<?php
};

?>