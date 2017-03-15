<?php

use Services\PostServices\PostService;

require_once(__DIR__ . "/../Data/User.php");
require_once(__DIR__ . '/../Data/Post.php');
require_once(__DIR__ . '/../Services/PostServices/PostService.php');
require_once __DIR__ . '/../Access/notLogged.php';


require_once "../header.php" ?>

<!-- ===================================================== -->

<h1 class="text-center">
    Searched Posts
</h1>

<div class="post-container">

    <?php
//var_dump($_POST);exit;
    if (!isset($_POST['searchButton']) || empty(trim($_POST['searchField']))) {
        header('Location: /../home.php');
    }

    $searchedText = $_POST['searchField'];

    $postService = new PostService();
    $postCollection = $postService->getSearchedPosts($searchedText);


    foreach($postCollection as $post) { ?>
        <div class="panel post panel-default">
            <a href="post.php?id=<?= $post->getId() ?>" class="panel-heading fill">
                <h4>
                    <?= $post->getTitle() ?>

                    <span class="pull-right">
                        <!-- Change to the category of the post -->
                        <?=  ucfirst($post->getCategory()) ?>
                    </span>
                </h4>
            </a>
            <div class="panel-body">
                <p class="mediumText">
                    <?= substr($post->getContent(), 0 , 50);if(strlen($post->getContent())>50){ echo "...";}; ?>
                </p>
            </div>
            <div class="panel-footer">
                <a href="#" class="user">
                    <?= $post->getUser() ?>
                    <p class="pull-right"> Views: <?= $post->getViews() ?> </p>
                </a>
            </div>
        </div>
    <?php } ?>
</div>


<?php require_once "../footer.php" ?>
