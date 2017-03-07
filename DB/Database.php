<?php

namespace DB;

use Models\User as User;
use Models\Post as Post;
// require_once "DBConnect.php";

class Database
{
    public static function getEmail(User $user)
    {
        $db = DBConnect::getInstance();
        return $db->getEmail($user->getEmail());
    }

    public static function addUser(User $user)
    {
        $db = DBConnect::getInstance();
        return $db->addUser($user->getEmail(), $user->getName(), $user->getPassword());
    }

    public static function getUser($email, $password)
    {
        $db = DBConnect::getInstance();
        return $db->getUser($email, $password);
    }
    
    public static function getUserByID($id)
    {
        $db = DBConnect::getInstance();
        return $db->getUserByID($id);
    }

    public static function makePost(Post $post)
    {
        $db = DBConnect::getInstance();
        return $db->makePost($post->getUser(), $post->getTitle(), $post->getContent(), $post->getCategory());
    }

    public static function editProfile($name, $password, $userId)
    {
        $db = DBConnect::getInstance();
        return $db->editProfile($name, $password, $userId);
    }

    public static function getPosts()
    {
        $db = DBConnect::getInstance();
        return $db->getPosts();
    }

    public static function getCategories()
    {
        $db = DBConnect::getInstance();
        return $db->getCategories();
    }
    
    public static function getCategoryName($cat_id)
    {
        $db = DBConnect::getInstance();
        return $db->getCategoryName($cat_id);
    }
}
