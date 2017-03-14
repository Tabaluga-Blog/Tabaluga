<?php

namespace Services;

use DB\DBConnect;

use Data\Comment;
use Services\CommentServiceInterface;

require_once __DIR__ . '/../DB/DBConnect.php';
require_once 'CommentServiceInterface.php';
 
class CommentService implements CommentServiceInterface
{
    public function getCommentsOfPostWithId($id)
    {
        $sql = "SELECT * FROM comments WHERE post_id=$id ORDER BY id DESC";

        $result = DBConnect::db()->query($sql);
        
        return $result;
    }

    public function addComment(Comment $comment)
    {
 
        $user_id = $comment->getUser();
        $post_id = $comment->getPost();
        $content = $comment->getContent();

        $sql = "INSERT INTO comments (user_id, post_id, content) 
                VALUES ('$user_id', '$post_id', '$content')";
 
        $result = DBConnect::db()->query($sql);
        return $result;
    }
}