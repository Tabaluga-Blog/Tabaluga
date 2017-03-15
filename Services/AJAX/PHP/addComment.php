<?php 

use Data\Comment;
use Services\CommentService;

require_once __DIR__ . './../../../Data/Comment.php';
require_once __DIR__ . './../../CommentService.php';

$post_id = $_POST['id'];
$sender = $_POST['sender'];
$loggedUserId = $_POST['userId'];

if ($loggedUserId != $sender) {
    echo "ERROR";
    exit;
}


$content = htmlentities($_POST['content']);

$cs = new CommentService();

$comment = new Comment($content, $post_id, $sender);

$result = $cs->addComment($comment);

var_dump($result);