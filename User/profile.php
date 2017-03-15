<?php

use Data\User;
use Services\PostServices\PostService;
use Services\UserServices\UserService;

require_once("../Data/User.php");
require_once('../Data/Post.php');
require_once ("../Services/PostServices/PostService.php");
require_once ("../Services/UserServices/UserService.php");
require_once '../Access/notLogged.php';

require_once("../header.php");

$id = $_GET['id'];

$postService = new PostService();
$allPosts = $postService->getPostsByUserId($id);

$userService = new UserService();
$name = $userService->getUserNameByID($id);

?>


<h1 class="text-center">
    Posts of <?= $name; ?>
</h1>

<div class="post-container">
    <?php

    require_once "../views/showPosts.view.php"
    ?>
</div>


<?php require_once "../footer.php" ?>