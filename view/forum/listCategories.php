<?php
$categories = $result["data"]['categories'];  
?>

<h2>Catégories :</h2>

<?php
foreach($categories as $categorie ){
?>
    <a href="index.php?ctrl=forum&action=listTopicsByIdCategorie&id=<?=$categorie->getId()?>">
    <h2><?=$categorie->getLibelle()?>  <a href="index.php?ctrl=forum&action=editCategorie&id=<?=$categorie->getId()?>"><i class="fa-solid fa-pen-to-square"></i></a>
</h2> 
    </a><br>

    <?php } ?>

    <div >
    <form action="index.php?ctrl=forum&action=ajoutCategorie" method="post">
        <label >
            Ajout d'une Catégorie
        </label><br>
            <input type="text" name="libelle"  required>       
            <input type="submit" value="Ajouter">
    </form>
    </div>

