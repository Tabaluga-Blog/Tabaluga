<?php

namespace Services;

use Data\Comment;


class CommentService
{
    public function getCommentsOfPostWithId($id)
    {
        $sql = "SELECT * FROM comments WHERE post_id=$id ORDER BY id DESC";

        $result = $this->mysqli->query($sql);
        
        return $result;
    }
 
    
 
    public function addComment(Comment $comment)
    {
 
        $user_id = $comment->getUser();
        $post_id = $comment->getPost();
        $content = $comment->getContent();
 
        
 
        $sql = "INSERT INTO comments (user_id, post_id, content) 
                VALUES ('$user_id', '$post_id', '$content')";
 
        $result = $this->mysqli->query($sql);
        return $result;
    }
}