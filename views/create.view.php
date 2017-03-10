<?php  
use DB\Database;
?>

<form autocomplete="off" class="xlarge" action="create.php" method="post">
    <div class="panel panel-default">
        <!-- Title -->
        <div class="panel-heading">

            <h2 class="panel-title">
                Post title:
                <span class="error"><?php echo $message; ?><span>

            </h2>
        </div>

        <input required type="text" name="title" class="form-control noRound" placeholder="Top 10 coolest cats!">

        <!-- Content -->
        <div class="panel-heading">
            <h3 class="panel-title">Content:</h3>
        </div>
        <textarea required type="text" name="content" class="form-control noResize noRound" rows="12" placeholder="1. Jimmy &#10;2. Roger &#10;3. Etc. . ."></textarea>

        <div class="panel-body">
            <select required class="custom-select fill bigText" name="category">
            <option disabled selected>Categories:</option>
                <?php
                    $category = Database::getCategories();

                    foreach ($category as $cat){
                        ?> <option value="<?php echo $cat['id']?>"> <?php echo ucfirst($cat['name'])?></option> <?php
                    }

                ?>
            </select>
        </div>

        <input class="quarterMissing bigText btn btn-success" type="submit" name="submit" value="Make post">
    </div>
</form>