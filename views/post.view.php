<?php 
use Models\Post;

$id = intval($_GET['id']);
$post = Post::getPostById($id);
// $comments = Post::getCommentsOfPost($id);
?>

<div class="panel panel-default">
    <div class="panel-heading mediumText text-center">
        <?= $post->getTitle() ?> <span class="pull-right"> <?php echo ucfirst($post->getCategoryName()) ?></span>
    </div>
    
    <div class="panel-body mediumText">
        <div class="post-display">
            <?= $post->getContent() ?>
        </div>
    </div>
    
    <div class="panel-heading">
        <h4>
            <a href="/profile?id=3" class="mediumText"> <?= $post->getUser() ?> </a>
            <p class="date pull-right mediumText"> <?= $post->getDate() ?> </p>
        </h4>
    </div>
</div>

<div class="comments">
    
</div>