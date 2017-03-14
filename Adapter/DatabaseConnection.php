<?php

namespace Adapter;

use Data\User;

require_once (__DIR__ . "/DatabaseConnectionInterface.php");

class DatabaseConnection implements DatabaseConnectionInterface
{
    private $databaseHost = 'localhost';
    private $databaseName = 'tabalugadb';
    private $databaseUsername = 'root';
    private $databasePassword = '';

    private $mysqli;

    private static $instance = null;

    private function __construct() {

        $this->mysqli = new \mysqli($this->databaseHost, $this->databaseUsername, $this->databasePassword, $this->databaseName);

        if($this->mysqli->connect_errno > 0){
            die('Unable to connect to database [' . $this->mysqli->connect_error . ']');
        }
    }

    private static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public static function db(){
        return self::getInstance()->mysqli;
    }

    //Post Functions
    public function makePost(User $user, string $title, string $content, int $category)
    {
        $stmt = $this->mysqli->prepare('INSERT INTO posts (user_id, title, content, category_id)  VALUES (?, ?, ?, ?)');

        $userId = intval($user->getId());

        $stmt->bind_param("issi", $userId, $title, $content, $category);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getCategoryName($cat_id)
    {
        $sql = "SELECT name from categories where id={$cat_id} LIMIT 1";
        $query = $this->mysqli->query($sql);

        $name = $query->fetch_assoc()['name'];

        return $name;
    }

    public function getPosts()
    {
        $sql = 'SELECT DISTINCT * FROM posts ORDER BY `date` DESC';

        $posts = $this->mysqli->query($sql);

        return $posts;
    }

    public function getPostById($id)
    {
        $sql = "SELECT * from posts where id={$id} LIMIT 1";

        $query = $this->mysqli->query($sql);

        $post = $query->fetch_assoc();

        return $post;
    }

    public function getCategories()
    {
        $sql = 'SELECT * FROM categories';

        $categories = $this->mysqli->query($sql);

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