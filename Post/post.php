<?php 

use Services\PostServices\PostService;

require_once(__DIR__ . "/../Data/User.php");
require_once(__DIR__ . '/../Data/Post.php');
require_once(__DIR__ . '/../Services/PostServices/PostService.php');
require_once __DIR__ . '/../Access/notLogged.php';

require_once "../header.php";
//require_once __DIR__ . '/../views/post.view.php';


$id = intval($_GET['id']);

$postService = new PostService();

$post = $postService->getPostById($id);

//print_r($post);exit;

?>

<div class="panel panel-default">
    <div class="panel-heading mediumText text-center">
        <?= $post['postTitle'] ?> <span class="pull-right"> <?php echo ucfirst($post['categoryName']) ?></span>
    </div>

    <div class="panel-body mediumText">
        <div class="post-display">
            <?= $post['postContent'] ?>
        </div>
    </div>

    <div class="panel-heading">
        <h4>
            <a href="/User/profile?id=<?= $post['userId'] ?>" class="mediumText"> <?= $post['userName'] ?> </a>
            <p class="date pull-right mediumText"> <?= $post['postDate'] ?> </p>
        </h4>
    </div>
</div>

<div class="comments">

</div>


<?php

require_once '../footer.php';
