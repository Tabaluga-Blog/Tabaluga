<?php 

use Services\PostServices\PostService;

require_once '../Data/User.php';
require_once '../Access/notLogged.php';
require_once './../Services/PostServices/PostService.php';

$userId = $_GET['user_id'];
$postId = $_GET['post_id'];

if ($_SESSION['user']->getId() != $userId) {
    header("Location: /Home.php");
    exit;
}

$ps = new PostService();

$ps->deletePost($postId);

header("Location: /Home.php");
exit;
