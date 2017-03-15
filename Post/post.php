<?php 

use Services\PostServices\PostService;

require_once("../Data/User.php");
require_once('../Data/Post.php');
require_once('../Services/PostServices/PostService.php');
require_once '../Access/notLogged.php';

require_once "../header.php";

$id = intval($_GET['id']);

$postService = new PostService();

$post = $postService->getPostById($id);

require_once '../views/post.view.php';

require_once '../footer.php';
