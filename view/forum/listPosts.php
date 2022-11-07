<?php

$posts = (!$result["data"]['posts']) ? [] : $result["data"]['posts'];
$topic = $result["data"]['topic'];

?>

<h1><?= $topic ?> <?= ($topic->getClosed()) ? "<span class='label label-warning'>Closed</span>" : "" ?></h1>



<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Post</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    
    <?php
    foreach($posts as $post) : ?>
        <tr>
            <td class="small-col">By <a href=""><?= $post->getUser() ?></a><br><span class="small-text"><?= $post->getDatePost()->format("d-m-Y H:i") ?></span></td>
            <td><?= $post ?></td>
            <td class="small-col txt-center">
                <?= ($post->getUser()->getId() == App\Session::getUser()->getId()) 
                        ?   "<a href='#'><i class='fa-regular fa-pen-to-square'></i></a>
                            <a href='#'><i class='fa-regular fa-trash-can'></i></a>" 
                        : "" 
                ?>
            </td>
        </tr>
    <?php endforeach ?>

    </tbody>
</table>
