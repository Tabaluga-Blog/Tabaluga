<?php 

use Services\PostServices\PostService;
use Services\PostServices\EditPostService;

require_once '../Data/User.php';
require_once __DIR__ . '/../Services/PostServices/EditPostService.php';
require_once '../Services/PostServices/PostService.php';
require_once '../Access/notLogged.php';
require_once '../header.php';



$post_id = $_GET['id'];


$ps = new PostService();
$post = $ps->getPostById($post_id);

if ($_SESSION['user']->getId() != $post->getUserId()) {
    header("Location: /Home.php");
}

$message = "";

if (isset($_POST['submit'])) {
    $eps = new EditPostService();
    $user = $_SESSION['user'];
    $title = htmlentities($_POST['title']);

    $content = $_POST['content'];
    $content = str_replace("\n", "<br>", $content);
    $content = str_replace("<?php", "&lt;?php", $content);
    $content = str_replace("?>", "?&gt;", $content);
    $content = strip_tags($content, '<b><i><li><ul><ol><pre><code>');

    $isDraft = '';
    
    if (isset($_POST['fancy-checkbox-success'])) {
        $isDraft = 1;
    } else {
        $isDraft = 0;
    }
    
    $eps->editPost($post_id, $title, $content, $isDraft);
}

require_once '../views/editPost.view.php';
require '../footer.php';
