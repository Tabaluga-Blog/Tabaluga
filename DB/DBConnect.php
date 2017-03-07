<?php

namespace DB;
use Models\User as User;

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

        $pwd = md5($password);

        $stmt->bind_param("sss", $email, $name, $pwd);

        $stmt->execute();

        if ($stmt->affected_rows == 1){
            return true;
        }
        return false;
    }

    public function getUser($email, $password)
    {
        $sql = 'SELECT * FROM users where email = "' . $email . '" and password = "' . md5($password) . '"';

        $result = $this->mysqli->query($sql);

        $userInfo = $result->fetch_assoc();

        return $userInfo;
    }

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

    public function editProfile($name, $password)
    {
        //TODO: Add Functionality..
    }

    public function getPosts()
    {
        $sql = 'SELECT DISTINCT * FROM posts ORDER BY `date` DESC';
        
        $posts = $this->mysqli->query($sql);

        return $posts;
    }

    public function getCategories()
    {
        $sql = 'SELECT * FROM categories';

        $categories = $this->mysqli->query($sql);

        return $categories;
    }
    
    public function getUserByID($id)
    {
        $sql = "SELECT name FROM users WHERE id={$id} LIMIT 1";
        
        $query = $this->mysqli->query($sql);
        $name = $query->fetch_assoc()['name'];
        
        return $name;
    }
    
    public function getCategoryName($cat_id)
    {
        $sql = "SELECT name from categories where id={$cat_id} LIMIT 1";
        $query = $this->mysqli->query($sql);
        
        $name = $query->fetch_assoc()['name'];
        
        return $name;
    }
}
