<?php

$posts = $result["data"]['posts'];
// $topic = $result["data"]['topic'];

?>

<h1>Liste des  Posts</h1>

<?php
foreach($posts as $post ){

    ?>

    <p> <br><?=$post->getTexte()?><br> <?=$post->getDatePost()?></p>
    <?php
}




