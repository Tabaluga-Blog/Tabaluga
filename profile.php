<?php

use Models\Post as Post;

require_once("Models/User.php");
require_once('Models/Post.php');
require_once("DB/DBConnect.php");
require_once("DB/Database.php");
require_once 'notLogged.php';
include_once 'header.php';

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>
<body>
<?php require_once "Header.php" ?>
<h1 class="text-center">
    My Posts
</h1>

<div class="post-container">
    <!-- $post should be changed to an object of type Post -->
    <?php

    foreach(Post::getAllPostsFromCurrentUser($_SESSION['user']->getId()) as $POST) { ?>
        <div class="panel post panel-default">
            <a href="/project/trunk//post.php?id=<?= $POST->getId() ?>" class="panel-heading fill">
                <h4>
                    <?= $POST->getTitle() ?>

                    <span class="pull-right">
                        <!-- Change to the category of the post -->
                        <?=  ucfirst($POST->getCategoryName()) ?>
                    </span>
                </h4>
            </a>
            <div class="panel-body">
                <div class="post-content">
                    <?= substr($POST->getContent(), 0 , 300);if(strlen($POST->getContent())>300){ echo "...";}; ?>
                </div>
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
</body>
</html>
