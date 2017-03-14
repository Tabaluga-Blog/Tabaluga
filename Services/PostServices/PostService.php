<?php

namespace Services\PostServices;

use Data\Post;

use DB\DBConnect;
use Services\UserServices\UserService;
use Services\PostServices\PostServiceInterface;

require_once 'PostServicesInterfaces/PostServiceInterface.php';
require_once (__DIR__ . '/../UserServices/UserService.php');
require_once (__DIR__ . '/../../Data/Post.php');
require_once( __DIR__ . "/../../DB/DBConnect.php");


class PostService implements PostServiceInterface
{
    public function makePost($userId, string $title, string $content, int $category)
    {
        $stmt = DBConnect::db()->prepare('INSERT INTO posts (user_id, title, content, category_id)  VALUES (?, ?, ?, ?)');

        $stmt->bind_param("issi", $userId, $title, $content, $category);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getCategoryName($cat_id)
    {
        $sql = "SELECT name from categories where id={$cat_id} LIMIT 1";
        $query = DBConnect::db()->query($sql);

        $name = $query->fetch_assoc()['name'];

        return $name;
    }

    public function getPosts()
    {
        $userService = new UserService();

        $sql = 'SELECT 	p.id as postId, 
                        p.date as postDate, 
                        p.content as postContent, 
                        p.title as postTitle, 
                        p.views as postViews,
                        p.user_id as userId,
                        u.name as userName, 
                        c.name as categoryName
                FROM posts as p
                JOIN users as u ON u.id = p.user_id
                JOIN categories as c ON c.id = p.category_id
                ORDER BY `date` DESC';

        $postsDbResult = DBConnect::db()->query($sql);

        $posts = [];

        if($postsDbResult) {
            while ($post = $postsDbResult->fetch_assoc()) {

                $posts[] = Post::NewWithId( $post['postTitle'],
                                            $post['postContent'],
                                            $post['userName'],
                                            $post['categoryName'],
                                            $post['postDate'],
                                            $post['postId'],
                                            $post['postViews'],
                                            $post['userId']);
            }
        }
        return $posts;

    }
    
    /**
     * 
     * @param int $id ID of the post we want
     * @return Post 
     */
    public function getPostById($id)
    {
        $sql = "SELECT 	p.id as postId, 
                        p.date as postDate, 
                        p.content as postContent, 
                        p.title as postTitle, 
                        p.views as postViews,
                        p.user_id as userId,
                        u.name as userName,
                        c.name as categoryName
                FROM posts as p
                JOIN users as u ON u.id = p.user_id
                JOIN categories as c ON c.id = p.category_id
                WHERE p.id = {$id}";

        $query = DBConnect::db()->query($sql);

        $result = $query->fetch_assoc();
        
        if($result) {
            $post = Post::NewWithId( $result['postTitle'],
                                        $result['postContent'],
                                        $result['userName'],
                                        $result['categoryName'],
                                        $result['postDate'],
                                        $result['postId'],
                                        $result['postViews'],
                                        $result['userId']);
        }
        
        return $post;
    }

    public function getCategories()
    {
        $sql = 'SELECT * FROM categories';

        $categories = DBConnect::db()->query($sql);

        return $categories;
    }

    public function getSearchedPosts($search)
    {
        $sql = "SELECT * FROM posts WHERE title LIKE " . "'%" . $search. "%'" ." OR content LIKE "  . "'%" . $search. "%'" ." ORDER BY `date` DESC ";

        $posts = $this->mysqli->query($sql);

        $selectedPosts = [];
        while ($album = $posts->fetch_assoc()) {
            $postObj = new Post($album['title'], $album['content'], $album['user_id'], $album['category_id'], $album['date']);

            $selectedPosts[] = $postObj;
        }

        return $selectedPosts;
    }




}