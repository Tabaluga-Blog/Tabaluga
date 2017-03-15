<?php 

use Data\Comment;

use Services\CommentService;

use Services\UserServices\UserService;

require __DIR__ . './../../../Data/Comment.php';
require_once './../../CommentService.php';
require_once './../../UserServices/UserService.php';


$id = $_GET['id'];
$wholeText = '';

$comments = [];

$results = CommentService::getCommentsOfPostWithId($id);

while($comment = $results->fetch_assoc()) {
    $username = UserService::getUserNameByID($comment['user_id']);
    
    $newComment = new Comment($comment['content'], $comment['post_id'], $username);
    
    $comments[] = $newComment;
}

foreach ($comments as $comment) {
    $wholeText .= $comment;
}

echo $wholeText;