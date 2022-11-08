<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];

?>

<h1>Posts du Topic: </h1>
<h2><?=$topic?></h2><??>

<?php
    foreach($posts as $post ){
?>
            <br><?=$post->getTexte()?><br> 
            Ajouté le : <?=$post->getDatePost()?><br>      
        
    <?php
}




