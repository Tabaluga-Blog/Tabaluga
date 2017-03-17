<?php

use Services\PostServices\PostService;

require_once("Data/User.php");
require_once('Data/Post.php');
require_once "Services/PostServices/PostService.php";
require_once 'Access/notLogged.php';

require_once ("header.php");
?>

<h1 class="text-center">
    Recent Posts
</h1>

<div class="post-container">
    <!-- $post should be changed to an object of type Post -->
    <?php

    $postService = new PostService();

    $allPosts = $postService->getPosts();

    require_once "views/showPosts.view.php"
    ?>
</div>


<?php require_once "footer.php" ?>
