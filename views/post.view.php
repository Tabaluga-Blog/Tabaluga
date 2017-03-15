<script type="text/javascript" src="../Services/AJAX/JS/commentSystem.js"></script>

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
            <p>
                <a href="/User/profile.php?id=<?= $post->getUserId() ?>" class="mediumText"> 
                    <?= $post->getUser() ?> 
                </a>
                
                <?php 
                    if ($_SESSION['user']->getId() == $post->getUserId()) {
                        echo "|
                        <a href=\"/Post/editPost.php?id={$post->getId()}\"><i class=\"fa fa-pencil mediumText\" aria-hidden=\"true\"></i></a>
                        |
                        <i class=\"fa fa-trash mediumText\" id=\"prompt\" aria-hidden=\"true\"></i>";
                    }
                 ?>
            </p>
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
    getComments(<?= $id ?>, <?= $_SESSION['user']->getId() ?>);
    
    $("#prompt").on("click", function () {
        var opt = confirm("You're about to delete your post.");
        
        if (opt == true) {
            window.location.replace("/Post/delete.php?post_id=<?= $post->getId() ?>&user_id=<?= $post->getUserId() ?>");
        }
    });
</script>