<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];

?>

<form action= "index.php?ctrl=forum&action=addPost&id=<?= $topic->getId() ?>" method="POST">
<label for="text">Post: </label><br>
<textarea name="texte" id="text" required></textarea><br><br>
<input type="submit" value="Ajouter">
</form>

<h1>Posts du Topic "<?=$topic?>" :</h1>

<?php
    foreach($posts as $post ){
?>
            <br><?=$post->getTexte()?><br> 
            <p>Ajouté le : <?=$post->getDatePost(). " by " .$post->getUser()?><br><p>      
        
    <?php


}




