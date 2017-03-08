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
require_once 'views/post.view.php';
require 'footer.php';
