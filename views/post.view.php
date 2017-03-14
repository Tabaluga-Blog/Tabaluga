
<div class="panel panel-default">
    <div class="panel-heading mediumText text-center">
        <?= $post->getTitle() ?> <span class="pull-right"> <?php echo ucfirst($post->getCategory()) ?></span>
    </div>

    <div class="panel-body mediumText">
        <div class="post-display">
            <?= $post->getContent() ?>
        </div>
    </div>

    <div class="panel-heading post-footer fill">
        <h4>
            <p><a href="/User/profile.php?id=<?= $post->getUserId() ?>" class="mediumText"> <?= $post->getUser() ?> </a></p>
            <p> Views: <?= $post->getViews() ?> </p>
            <p class="date pull-right mediumText"> <?= $post->getDate() ?> </p>
        </h4>
    </div>
</div>

<div class="comments">

</div>