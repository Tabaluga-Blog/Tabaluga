<?php 
namespace Services\PostServices;

use Exception;

use Data\Post;


require_once __DIR__ . "/../../Data/Post.php";

class EditPostService 
{
    public function editPost($postId, $title, $content, $isDraft)
    {
        $eps = new PostService();
        
        try {
            $post = new Post($title, $content, $userId, $category, date("Y-m-d H:i;s"));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
        if ($post != "") {
            $result = $eps->editPost($postId, $title, $content, $isDraft);
            
            if ($result) {
                header("Location: /../Home.php");
            }
        }
        
        return $message;
    }
}

?>