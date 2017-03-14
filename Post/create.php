<?php

use Services\PostServices\MakePostService;

require '../Access/notLogged.php';
require_once '../Services/PostServices/PostService.php';
require_once '../header.php';
    
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


    $makePostService = new MakePostService();
    $message = $makePostService->makePost($title, $content, $user->getId(), $category);

}

require_once '../views/create.view.php';
require '../footer.php';
