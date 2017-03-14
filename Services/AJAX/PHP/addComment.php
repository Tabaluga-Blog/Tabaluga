<?php 

use Data\Comment;
use Services\CommentService;

require '../../Data/Comment.php';
require '../CommentService.php';

$post_id = $_POST['id'];
$sender = $_POST['sender'];
$content = $_POST['content'];

$cs = new CommentService();

$comment = new Comment($content, $post_id, $sender);

$result = $cs->addComment($comment);

var_dump($result);
