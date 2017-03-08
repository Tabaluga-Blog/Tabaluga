<?php

use Models\Post as Post;

require_once("Models/User.php");
require_once('Models/Post.php');
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';

require_once "header.php" ?>

<!-- ===================================================== -->

<h1 class="text-center">
    Recent Posts
</h1>

<div class="post-conatiner">
    <!-- $post should be changed to an object of type Post -->
    <?php 
    
    foreach(Post::getAllPosts() as $POST) { ?>
        <div class="panel post panel-default">
            <a href="/post.php?id=<?= $POST->getId() ?>" class="panel-heading fill">
                <h4>
                    <?= $POST->getTitle() ?>
                    
                    <span class="pull-right">
                        <!-- Change to the category of the post -->
                        <?=  ucfirst($POST->getCategoryName()) ?>
                    </span>
                </h4>
            </a>
            <div class="panel-body">
                <p class="mediumText">
                    <?= $POST->getContent() ?>
                </p>
            </div>
            <div class="panel-footer">
                <a href="#" class="user">
                    <?= $POST->getUser() ?>
                </a>
            </div>
        </div>
    <?php } ?>
</div>


<?php require_once "footer.php" ?>
