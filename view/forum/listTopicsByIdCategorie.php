<?php
$topics = (!$result["data"]['topics']) ? [] : $result["data"]['topics'];
$categorie = $result["data"]['categorie'];
// var_dump($categorie)
?>

<h1>Topics de la Catégorie <?= $categorie ?> :</h1>
<?php
    if(!$topics) 
    {
        echo "Aucun Topic dans cette Catégorie";
    } 
    else
    {
        foreach($topics as $topic )
        {
            ?>
            <a href="index.php?ctrl=forum&action=listPostsByIdTopic&id=<?=$topic->getId()?>">    
                    <?= $topic->getTitle()                  ?>
                    <?php if($topic->getClosed() == 1) {    ?>                   
                        <i class="fa-solid fa-lock"></i>
                    <?php } else {                          ?>                                     
                        <i class="fa-solid fa-lock-open"></i>
                    <?php }                                 ?>
            </a>               
            <p>Ajouté le : <?=$topic->getDateTopic()." by ".$topic->getUser()?></p> 
            <?php 
        }
    }
?>
<h3>Ajouter un Topic</h3>
<form action= "index.php?ctrl=forum&action=addTopic&id=<?= $categorie->getId() ?>" method="POST">
    <label for="name">
        Titre  Topic: <br>
    </label>
        <input type="text" name="title" id="title" required> <br>
    <label for="text">
        Post: <br>
    </label>
    <textarea name="texte" id="texte" required></textarea><br>
    <input type="submit" name="submit" value="Ajouter">
</form>



  
