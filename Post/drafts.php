<?php

use Services\PostServices\PostService;

require_once(__DIR__ . "/../Data/User.php");
require_once(__DIR__ . '/../Data/Post.php');
require_once(__DIR__ . '/../Services/PostServices/PostService.php');
require_once __DIR__ . '/../Access/notLogged.php';


require_once "../header.php" ?>

<!-- ===================================================== -->

<h1 class="text-center">
     Drafts
</h1>

<div class="post-container">

    <?php

    $postService = new PostService();
    $allPosts = $postService->getDrafts($_SESSION['user']->getId());

    require_once "../views/showPosts.view.php"
    ?>
</div>


<?php require_once "../footer.php" ?>
