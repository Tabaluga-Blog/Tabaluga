<?php 

use DB\Database;
use Models\Comment as Comment;

require_once("../DB/Database.php");
require_once("../DB/DBConnect.php");
require_once '../Models/Comment.php';

$id = $_GET['id'];
$wholeText = '';

$results = Database::getCommentsOfPostWithId($id);

while($comment = $results->fetch_assoc()) {
    $username = Database::getUserNameByID($comment['user_id']);
    
    $newComment = new Comment($comment['content'], $comment['post_id'], $username);
    
    $comments[] = $newComment;
}

foreach ($comments as $comment) {
    $wholeText .= $comment;
}

echo $wholeText;