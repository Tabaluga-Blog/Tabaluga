<?php
namespace Models;

use Exception;

use DB\Database;

class Post
{
    private $id;
    private $title;
    private $content;
    private $user;
    private $category;
    private $date;

    public function __construct($title, $content, $user, $category, $date)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setUser($user);
        $this->setCategory($category);
        $this->setDate($date);
    }
    
    public static function NewWithId($title, $content, $user, $category, $date, $id)
    {
        $instance = new self($title, $content, $user, $category, $date);
        $instance->setId($id);
        
        return $instance;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        if (strlen($title) < 2)
        {
            throw new Exception("Title must be at least 2 characters long.");
        }
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        if (strlen($content) < 10)
        {
            throw new Exception("Content must be at least 10 characters long.");
        }

        $this->content = $content;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getCategory()
    {
        return $this->category;
    }
    
    public function getCategoryName()
    {
        return Database::getCategoryName($this->category);
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function editPost(){}

    public function deletePost(){}
        
    //---------------------------------------------
    //---------------------------------------------
    //---------------------------------------------
    
    public static function getAllPosts()
    {
        /**
        *@var Post[]
        */
        $posts = [];
        
        if($query = Database::getPosts()) {
        while ($post = $query->fetch_assoc()) {
            $username = Database::getUserByID($post['user_id']);
            
            $posts[] = Post::NewWithId($post['title'], $post['content'], $username, $post['category_id'], $post['date'], $post['id']);
            }
        }
        return $posts;
    }
    
    public static function getPostById($id)
    {
        $post = Database::getPostById($id);

        $username = Database::getUserByID($post['user_id']);
        
        $postObj = Post::NewWithId($post['title'], $post['content'], $username, $post['category_id'], $post['date'], $post['id']);
        
        return $postObj;
    }
}