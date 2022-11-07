<?php

$topics = $result["data"]['topics'];
    
?>

<h1>Liste des  Topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <p><?=$topic->getTitle()?> by <?=$topic->getUser()?></p>

    <?php
}


  
