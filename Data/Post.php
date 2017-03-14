<?php
namespace Data;

use Exception;

use DB\DBConnect;

require_once (__DIR__  . "/../DB/DBConnect.php");

class Post
{
    private $id;
    private $title;
    private $content;
    private $user;
    private $category;
    private $date;
    
    //This constructor is used when creating a new post
    public function __construct($title, $content, $user, $category, $date)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setUser($user);
        $this->setCategory($category);
        $this->setDate($date);
    }
    
    //This constructor is used for when we want to display a post
    public static function NewWithId($title, $content, $user, $category, $date, $id)
    {
        $instance = new self($title, $content, $user, $category, $date);
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
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }



}