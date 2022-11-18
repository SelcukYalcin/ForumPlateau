<?php
$topic = ($result["data"]["topic"]);
?>
<h1>Editer un Topic</h1>
<form method="post">
        <label>
            <input type="text" name="title" value="<?= $topic->getTitle()?>">
        </label>
        <input type="submit" value="enregistrer">
</form>