<?php
use Models\Post;
use DB\Database;


require_once("Models/User.php");
require_once("Models/Post.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';
require_once 'header.php';
    
$message = "";

if (isset($_POST['submit'])) {
    $user = $_SESSION['user'];
    $title = strip_tags($_POST['title']);
    
    $content = $_POST['content'];
    $content = str_replace("\n", "<br>", $content);
    $content = str_replace("<?php", "&lt;?php", $content);
    $content = str_replace("?>", "?&gt;", $content);
    $content = strip_tags($content, '<b><i><li><ul><ol><pre><code>');
    
    
    $category = $_POST['category'];

    $post = "";

    try{
        $post = new Post($title, $content, $user, $category, date("Y-m-d H:i:s"));
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

require_once 'views/create.view.php';

require 'footer.php';
