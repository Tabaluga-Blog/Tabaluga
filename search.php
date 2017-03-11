<?php

use DB\Database;

require_once("Models/User.php");
require_once('Models/Post.php');
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';

require_once "header.php"  ?>

<!-- ===================================================== -->

<h1 class="text-center">
    Searched Posts
</h1>

<div class="post-conatiner">
    <!-- $post should be changed to an object of type Post -->
    <?php

    if (!isset($_POST['searchButton']) || empty(trim($_POST['searchField']))) {
        header('Location: home.php');
    }

    $searchedText = $_POST['searchField'];

    $postCollection = Database::getSearchedPosts($searchedText);



    foreach($postCollection as $post) { ?>
        <div class="panel post panel-default">
            <a href="/tabaluga/post.php?id=<?= $post->getId() ?>" class="panel-heading fill">
                <h4>
                    <?= $post->getTitle() ?>

                    <span class="pull-right">
                        <!-- Change to the category of the post -->
                        <?=  ucfirst($post->getCategoryName()) ?>
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
                    <?= Database::getUserNameByID($post->getUser()) ?>
                </a>
            </div>
        </div>
    <?php } ?>
</div>


<?php require_once "footer.php" ?>
