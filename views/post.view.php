
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

<div class="panel panel-default comment-form"> 
    <input type="hidden" id="sender" value="<?= $_SESSION['user']->getId() ?>"/> 
    <h4 class="panel-body user fill" id="name"><?= $_SESSION['user']->getName() . " (" . $_SESSION['user']->getEmail() ?>)</h4> 
    <div class="comment-content"> 
        <textarea id="content" class="comment-form-content" placeholder="Comment . . ." maxlength="400"></textarea> 
        <button type="button" class="btn btn-default" id="addComment" onclick="addComment(<?= $id ?>)">Comment</button> 
    </div> 
</div> 
 
<hr> 
 
<div id="comments" class="comments"> 
</div> 
<script type="text/javascript"> 
    getComments(<?= $id ?>); 
</script>