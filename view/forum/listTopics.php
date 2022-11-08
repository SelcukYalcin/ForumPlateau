<?php

$topics = $result["data"]['topics'];
$categorie = $result["data"]['categorie']
?>

<h1>Topics de la Catégorie:</h1>
<h2><?= $categorie ?></h2>

<?php
foreach($topics as $topic ){

    ?>
     <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>"><br>
        
            <?=$topic->getTitle()?></a><br>
            Ajouté le : <?=$topic->getDateTopic()?>
    
    
    <?php
}


  
