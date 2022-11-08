<?php

$topics = $result["data"]['topics'];
$categorie = $result["data"]['categorie']
?>

<h1>Topics de la Catégorie <?= $categorie ?> :</h1>


<?php
foreach($topics as $topic ){

    ?>
     <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>"><br>
        
            <h2><?=$topic->getTitle()?></h2></a><br>
            <p>Ajouté le : <?=$topic->getDateTopic()?></p>
    
    
    <?php
}


  
