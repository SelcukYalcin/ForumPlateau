<?php

$topics = $result["data"]['topics'];
$categorie = $result["data"]['categories']    
?>

<h1>Liste des  Topics</h1>

<?php
foreach($topics as $topic ){

    ?>
    <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>">
    <p> <br><?=$topic->getTitle()?> <?=$topic->getDateTopic()?></p>
    </a>
    <?php
}


  
