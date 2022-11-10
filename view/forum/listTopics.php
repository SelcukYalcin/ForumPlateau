<?php

$topics = $result["data"]['topics'];
$categorie = $result["data"]['categorie'];
?>


<form action= "index.php?ctrl=forum&action=addTopic&id=<?= $categorie->getId() ?>" method="POST">
    <label for="name">Titre  Topic: </label><br>
    <input type="text" name="title" id="name" required> <br><br>
    <label for="text">Post: </label><br>
    <textarea name="texte" id="text" required></textarea><br><br>
    <input type="submit" value="Ajouter">
</form>
<h1>Topics de la Catégorie <?= $categorie ?> :</h1>


<?php
foreach($topics as $topic ){
?>
    <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>">
        <h2>
            <?= $topic->getTitle()?>

            <?php if($topic->getClosed() == 1) {?>
                <i class="fa-solid fa-lock"></i>
            <?php }else {?>
                <i class="fa-solid fa-lock-open"></i>
            <?php } ?>

        </h2>
    </a>
    <p>Ajouté le : <?=$topic->getDateTopic()." by ".$topic->getUser()?></p>


    
    
    <?php
}
?>




  
