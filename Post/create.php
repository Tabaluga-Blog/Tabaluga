<?php

use Services\PostServices\PostService;
use Services\PostServices\MakePostService;

require_once '../Data/User.php';
require_once __DIR__ . '/../Services/PostServices/MakePostService.php';
require_once '../Services/PostServices/PostService.php';
require_once '../Access/notLogged.php';
require_once '../header.php';

$ps = new PostService();
$message = "";

if (isset($_POST['submit'])) {
    $user = $_SESSION['user'];
    $title = htmlentities($_POST['title']);

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
