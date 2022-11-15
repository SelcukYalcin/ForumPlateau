<?php
$categories = $result["data"]['categories'];    
?>
<h1>Liste des Catégories :</h1>
<?php
foreach($categories as $categorie ){
?>
    <a href="index.php?ctrl=forum&action=listTopicsByIdCategorie&id=<?=$categorie->getId()?>">
    <h2><?=$categorie->getLibelle()?></h2>
    </a>
    <?php } ?>

    <div >
    <h2>Ajout d'une Catégorie</h2>
    <form action="index.php?ctrl=forum&action=ajoutCategorie" method="post">
        <label >
            <input type="text" name="libelle"  required>
        </label>
        <input type="submit" value="Ajouter">
    </form>
    </div>

