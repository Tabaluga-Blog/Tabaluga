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
    private $views;
    
    //This constructor is used when creating a new post
    public function __construct($title, $content, $user, $category, $date, $views)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setUser($user);
        $this->setCategory($category);
        $this->setDate($date);
        $this->setViews($views);
    }
    
    //This constructor is used for when we want to display a post
    public static function NewWithId($title, $content, $user, $category, $date, $views, $id)
    {
        $instance = new self($title, $content, $user, $category, $date, $views);
        $instance->setId($id);
        
        return $instance;
    }
    
    //88888888888888888888
    // GETTERS AND SETTERS
    //88888888888888888888
    
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
    
    public function getViews()
    {
        return $this->views;
    }
    
    public function setViews($views)
    {
        $this->views = $views;
    }

    public function editPost(){}

    public function deletePost(){}
        
    //88888888888888888888
    //Get posts from DB
    //88888888888888888888
    
    
    /**
    * Display all the posts in the database
    *
    * @return Post[]
    */
    public static function getAllPosts()
    {
        $posts = [];
        
        if($query = Database::getPosts()) {
        while ($post = $query->fetch_assoc()) {
            $username = Database::getUserNameByID($post['user_id']);
            
            $posts[] = Post::NewWithId($post['title'], $post['content'], $username, $post['category_id'], $post['date'], $post['views'], $post['id']);
            }
        }
        return $posts;
    }
    
    
    /**
    * Get a post from the database by its ID
    *
    * @param int $id
    * @return Post
    */
    public static function getPostById($id)
    {
        $post = Database::getPostById($id);
        
        $username = Database::getUserNameByID($post['user_id']);
        $postObj = Post::NewWithId($post['title'], $post['content'], $username, $post['category_id'], $post['date'], $post['views'], $post['id']);
        
        return $postObj;
    }
    
    /**
    * Add a view to a post by its ID
    * @param int $id The id of the post
    * @return bool 
    */
    public function addViewToPost($id)
    {
        try {
            Database::addViewToPost($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return true;
    }
}