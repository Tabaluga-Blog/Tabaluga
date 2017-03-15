<?php

use Data\User;
use Services\PostServices\PostService;

require_once("../Data/User.php");
require_once('../Data/Post.php');
require_once ("../Services/PostServices/PostService.php");
require_once '../Access/notLogged.php';

require_once("../header.php");
?>


<h1 class="text-center">
    Posts of <?= $_SESSION['user']->getName(); ?>
</h1>

<div class="post-container">
    <?php

    $id = $_GET['id'];

    $postService = new PostService();

    $allPosts = $postService->getPostsByUserId($id);

    require_once "../views/showPosts.view.php"
    ?>
</div>


<?php require_once "../footer.php" ?>