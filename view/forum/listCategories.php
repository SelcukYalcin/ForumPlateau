<?php

$categories = $result["data"]['categories'];
    
?>

<h1>Liste des Catégories</h1>

<?php
foreach($categories as $categorie ){

    ?>
    <a href="index.php?ctrl=forum&action=listTopics&id=<?=$categorie->getId()?>">
    <p><?=$categorie->getLibelle()?></p>
    </a>
    <?php
}
