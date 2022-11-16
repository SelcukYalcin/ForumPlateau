<?php
$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];
?>
    <h1>Posts du Topic "<?=$topic?>" :</h1>
    <?php   if($topic->getClosed() == 1) {      ?>     
            <i class="fa-solid fa-lock"></i>
    <?php } else {                              ?>    
            <i class="fa-solid fa-unlock"></i>
    <?php }                                     ?>     
    <?php   foreach($posts as $post ) {         ?>
            <?=$post->getTexte()?> 
            <p>Ajouté le : <?=$post->getDatePost(). " by " .$post->getUser()?><br><p>
    <?php } if($topic->getClosed() == 0) { ?>
                <div>
                    <h2>Ajouter un  Post</h2>      
                    <form  action="index.php?ctrl=forum&action=addPost&id=<?=$topic->getId()?>" method="post">
                        <label>
                            <textarea name="texte" required></textarea>
                        </label>
                        <input type="submit" value="AJOUTER">
                    </form>
                </div>
    <?php
    }