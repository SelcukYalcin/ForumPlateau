<?php

$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];

?>

<h1>Posts du Topic "<?=$topic?>" :</h1>

<?php
    foreach($posts as $post ){
?>
            <br><?=$post->getTexte()?><br> 
            <p>Ajouté le : <?=$post->getDatePost()?><br><p>      
        
    <?php
}




