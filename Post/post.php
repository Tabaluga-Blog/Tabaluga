<?php 

use Services\PostServices\PostService;

require_once(__DIR__ . "/../Data/User.php");
require_once(__DIR__ . '/../Data/Post.php');
require_once(__DIR__ . '/../Services/PostServices/PostService.php');
require_once __DIR__ . '/../Access/notLogged.php';

require_once "../header.php";
?>
<script type="text/javascript" src="http://localhost:3000/Services/AJAX/commentSystem.js"></script>
<?php
//require_once __DIR__ . '/../views/post.view.php';


$id = intval($_GET['id']);

$postService = new PostService();

$post = $postService->getPostById($id);

//print_r($post);exit;

require_once '../views/post.view.php';

require_once '../footer.php';
