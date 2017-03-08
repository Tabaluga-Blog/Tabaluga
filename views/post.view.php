<?php 
use Models\Post;

$id = intval($_GET['id']);
$post = Post::getPostById($id);
?>

<div class="panel panel-default">
    <div class="panel-heading bigText text-center">
        <?= $post->getTitle() ?> <span class="pull-right"> <?php echo ucfirst($post->getCategoryName()) ?></span>
    </div>
    
    <div class="panel-body mediumText">
        <?= $post->getContent() ?>
    </div>
    
    <div class="panel-heading">
        <h4>
            <a href="/profile?id=3"> <?= $post->getUser() ?> </a>
            <p class="date pull-right"> <?= $post->getDate() ?> </p>
        </h4>
    </div>
</div>