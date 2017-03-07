<?php
use Models\Post;
use DB\Database;


require_once("Models/User.php");
require_once("Models/Post.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';
require_once 'header.php';
// require_once 'views/post.view.php';


$message = "";

if (isset($_POST['submit'])) {
    $user = $_SESSION['user'];
    $title = $_POST['title'];
    $content = trim($_POST['content']);
    $content = trim(str_replace("\n", "<br>", $content));
    $category = $_POST['category'];

    $post = "";

    try{
        $post = new Post($title, $content, $user, $category);
    }
    catch (Exception $e){
        $message = $e->getMessage();
    }

    //check if post is created -> if not redirect to post form again
    if ($post != "")
    {
        $result = Database::makePost($post);

        if ($result) {
            header("location: Home.php");
        }
    }

}

?>

        <form class="xlarge" action="post.php" method="post">
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
<?php

require 'footer.php';
