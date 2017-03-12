<?php

namespace DB;

use Models\Post;
use Models\User as User;
use Models\Comment as Comment;

//implementing Singleton
class DBConnect
{
    private $db_hostname = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_database = "tabalugadb";

    private $mysqli;

    private static $instance = null;

    private function __construct() {

        $this->db_hostname = "localhost";
        $this->db_username = "root";
        $this->db_password = "";
        $this->db_database = "tabalugadb";

        $this->mysqli = new \mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_database);

        if($this->mysqli->connect_errno > 0){
            die('Unable to connect to database [' . $this->mysqli->connect_error . ']');
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    //88888888888888888888888888
    // USER FUNCTIONS
    //88888888888888888888888888

    public function getEmail($email)
    {
        $sql = 'SELECT * FROM users where email = "'.  $email . '"';

        $result = $this->mysqli->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function addUser($email, $name, $password)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO users (email, name, password)
                                        VALUES (?, ?, ?)");



        $stmt->bind_param("sss", $email, $name, $password);

        $stmt->execute();

        if ($stmt->affected_rows == 1){
            return true;
        }
        return false;
    }

    public function getUser($email, $password)
    {
        $sql = 'SELECT * FROM users where email = "' . $email . '" and password = "' . $password . '"';

        $result = $this->mysqli->query($sql);

        $userInfo = $result->fetch_assoc();

        return $userInfo;
    }

    public function changeName($newName, $userId)
    {
        $sql = "UPDATE users SET name = '$newName' WHERE id = '$userId'";
        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function changePassword($password, $userId)
    {
         $sql = ("UPDATE users SET password = '$password' WHERE id = '$userId'");
         $result = $this->mysqli->query($sql);
         return $result;
    }

    public function deleteProfile($user)
    {
        $now = date("Y-m-d H:i:s");

        $result = $this->mysqli->query("UPDATE users SET deleted_at = '$now' WHERE id='{$user->getId()}'");

        return $result;
    }

    public function getUserNameByID($id)
    {
        $sql = "SELECT name FROM users WHERE id={$id} LIMIT 1";

        $query = $this->mysqli->query($sql);
        $name = $query->fetch_assoc()['name'];

        return $name;
    }


    public function getChatUsers($user_id)
    {
        $sql = "SELECT DISTINCT u.id, u.name
	              FROM messages as m
	              JOIN users as u on u.id = m.receiver_id
	              WHERE sender_id =" .$user_id ."
                UNION
                SELECT DISTINCT u.id, u.name
	              FROM messages as m
	              JOIN users as u on u.id = m.sender_id
	              WHERE receiver_id = " . $user_id;

        $query = $this->mysqli->query($sql);

        $users = [];

        while ($result = $query->fetch_assoc())
        {
            $users[] = $result;
        }

        return $users;
    }

    public function getUserMessages($receiver_id, $loggedUser_id)
    {
        $sql = "SELECT u.name, m.content, m.date
                    FROM messages as m
                    JOIN users as u on u.id = ". $receiver_id ."
                    WHERE sender_id = ". $receiver_id ." AND receiver_id = ". $loggedUser_id ."
                UNION
                SELECT u.name, m.content, m.date
                    FROM messages as m
                    JOIN users as u on u.id = ". $loggedUser_id ."
                    WHERE sender_id = ". $loggedUser_id ." AND receiver_id = ". $receiver_id ."
                ORDER BY date";

        $query = $this->mysqli->query($sql);

        $messages = [];

        while ($result = $query->fetch_assoc())
        {
            $messages[] = $result;
        }

        return $messages;
    }

    public function sendMessage($sender_id, $receiver_id, $content)
    {
        $stmt = $this->mysqli->prepare('INSERT INTO messages (sender_id, receiver_id, content) VALUES (?, ?, ?)');

        $stmt->bind_param("iis", $sender_id, $receiver_id, $content);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }











    //88888888888888888888888888
    // POST FUNCTIONS
    //88888888888888888888888888

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

    public function addViewToPost($id)
    {
        $sql = "UPDATE posts SET views = views + 1 WHERE id = '$id'";
        
        $result = $this->mysqli->query($sql);
        
        return $result;
    }

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
