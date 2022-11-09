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
<h2>Test</h2>


<?php

foreach($topics as $topic ){

    ?>
    <a href="index.php?ctrl=forum&action=listPosts&id=<?=$topic->getId()?>"><br>
    <h2><?=$topic->getTitle()?></h2></a>
    <p>Ajouté le : <?=$topic->getDateTopic()." by ".$topic->getUser()?></p>
    
    
    <?php
}
?>




  
