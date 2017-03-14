<?php

namespace Services\PostServices;

use Data\Post;
use Exception;
use Services\PostServices\PostServicesInterfaces\MakePostServiceInterface;

require_once ( __DIR__ . "/../../Data/Post.php");
require_once (__DIR__ . "/../PostServices/PostServicesInterfaces/MakePostServiceInterface.php");

class MakePostService implements MakePostServiceInterface
{
    public function makePost($title, $content, $userId, $category)
    {
        $postService = new PostService();

        $post = "";
        $message = "";

        try{
            $post = new Post($title, $content, $userId, $category, date("Y-m-d H:i:s"));
        }
        catch (Exception $e){
            $message = $e->getMessage();
        }

        //check if post is created -> if not redirect to post form again
        if ($post != "")
        {
            $result = $postService->makePost($userId, $title, $content, $category);

            if ($result) {
                header("location: Home.php");
            }
        }

        return $message;
    }
}