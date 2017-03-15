<?php

use DB\DBConnect;
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
    if (!isset($_POST['searchButton']) || empty(trim($_POST['searchField']))) {
        header('Location: /../home.php');
    }

    $searchedText = $_POST['searchField'];

    $postService = new PostService();
    $allPosts = $postService->getSearchedPosts($searchedText);

    require_once "../views/showPosts.view.php"
    ?>
</div>


<?php require_once "../footer.php" ?>
