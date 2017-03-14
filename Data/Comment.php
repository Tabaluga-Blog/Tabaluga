<?php
namespace Data;

use Exception;

class Comment
{
    private $id;
    private $content;
    private $post;
    private $user;

    public function __construct($content, $post, $user)
    {
        $this->setContent($content);
        $this->setUser($user);
        $this->setPost($post);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        if (strlen($content) < 2){
            throw new Exception("Content length must be at least 2 characters long.");
        }
        if (strlen($content > 300)) {
            throw new Exception("Content exceeds limit ot 300");
        }
        $this->content = $content;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }
}