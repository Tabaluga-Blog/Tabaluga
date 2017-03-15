<style>
    .form-group input[type="checkbox"] {
        display: none;
    }

    .form-group input[type="checkbox"] + .btn-group > label span {
        width: 20px;
    }

    .form-group input[type="checkbox"] + .btn-group > label span:first-child {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:last-child {
        display: inline-block;
    }

    .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
        display: inline-block;
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
        display: none;
    }
    h2 {
        color: red;
    }
</style>

<form autocomplete="off" class="xlarge" action="editPost.php?id=<?= $post->getId()?>" method="post">
    <div class="panel panel-default">
        <!-- Title -->
        <div class="panel-heading">

            <h2 class="panel-title">
                Post title:
                <span class="error"><?php echo $message; ?><span>
            </h2>
        </div>

        <input required type="text" name="title" class="form-control noRound" placeholder="Top 10 coolest cats!" value="<?= $post->getTitle()?>">

        <!-- Content -->
        <div class="panel-heading">
            <h3 class="panel-title">Content:</h3>
        </div>
        <textarea required type="text" name="content" class="form-control noResize noRound" rows="12" placeholder="1. Jimmy &#10;2. Roger &#10;3. Etc. . ."><?= $post->getContent() ?></textarea>
        
        
        <div class="form-group fill centerBlock draftBtn-holder">
            <input type="checkbox"  name="fancy-checkbox-success" id="fancy-checkbox-success" autocomplete="off" />
            
            <div class="btn-group">
                <label for="fancy-checkbox-success" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-success" class="btn btn-default active">
                    Make Draft
                </label>
            </div>
        </div>

        <input class="quarterMissing bigText btn btn-success" type="submit" name="submit" value="Make post">
    </div>
</form>