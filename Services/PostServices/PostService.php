<?php

namespace Services\PostServices;

use Adapter\DatabaseConnection;
use Services\PostServices\PostServicesInterfaces\PostServiceInterface;
use Services\UserServices\UserService;
use Data\Post;

require_once (__DIR__ . '/../UserServices/UserService.php');
require_once (__DIR__ . '/../../Data/Post.php');
require_once( __DIR__ . "/../../Adapter/DatabaseConnection.php");
require_once (__DIR__ . "/../PostServices/PostServicesInterfaces/PostServiceInterface.php");


class PostService implements PostServiceInterface
{
    public function makePost($userId, string $title, string $content, int $category)
    {
        $stmt = DatabaseConnection::db()->prepare('INSERT INTO posts (user_id, title, content, category_id)  VALUES (?, ?, ?, ?)');

        $stmt->bind_param("issi", $userId, $title, $content, $category);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getCategoryName($cat_id)
    {
        $sql = "SELECT name from categories where id={$cat_id} LIMIT 1";
        $query = DatabaseConnection::db()->query($sql);

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
                        u.name as userName, 
                        c.name as categoryName
                FROM posts as p
                JOIN users as u ON u.id = p.user_id
                JOIN categories as c ON c.id = p.category_id
                ORDER BY `date` DESC';

        $postsDbResult = DatabaseConnection::db()->query($sql);

        $posts = [];

        if($postsDbResult) {
            while ($post = $postsDbResult->fetch_assoc()) {

                $posts[] = Post::NewWithId( $post['postTitle'],
                                            $post['postContent'],
                                            $post['userName'],
                                            $post['categoryName'],
                                            $post['postDate'],
                                            $post['postId']);
            }
        }
        return $posts;

    }

    public function getPostById($id)
    {
        $sql = "SELECT 	p.id as postId, 
                        p.date as postDate, 
                        p.content as postContent, 
                        p.title as postTitle, 
                        u.name as userName,
                        p.user_id as userId,
                        c.name as categoryName
                FROM posts as p
                JOIN users as u ON u.id = p.user_id
                JOIN categories as c ON c.id = p.category_id
                WHERE p.id = {$id}";

        $query = DatabaseConnection::db()->query($sql);

        $post = $query->fetch_assoc();

        return $post;
    }

    public function getCategories()
    {
        $sql = 'SELECT * FROM categories';

        $categories = DatabaseConnection::db()->query($sql);

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