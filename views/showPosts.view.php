<?php

foreach($allPosts as $post) { ?>
    <div class="panel post panel-default">
        <a href="/Post/post.php?id=<?= $post->getId() ?>" class="panel-heading fill">
            <h4>
                <?= substr($post->getTitle(), 0, 30);   if(strlen($post->getTitle())>30){ echo "...";};?>

                <span class="pull-right">
                        <!-- Change to the category of the post -->
                    <?=  ucfirst($post->getCategory()) ?>
                    </span>
            </h4>
        </a>
        <div class="panel-body">
            <div class="post-content">
                <?= substr($post->getContent(), 0 , 300); if(strlen($post->getContent())>300){ echo "...";}; ?>
            </div>
        </div>
        <div class="panel-footer">
            <a href="../User/profile.php?id=<?= $post->getUserId() ?>" class="user">
                <?= $post->getUser() ?>
                <p class="pull-right"> Views: <?= $post->getViews() ?> </p>
            </a>
        </div>
    </div>
<?php } ?>