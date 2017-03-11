<?php

namespace DB;

use Models\User as User;
use Models\Post as Post;

class Database
{

    //88888888888888888888888888
    // USER FUNCTIONS
    //88888888888888888888888888
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

    /**
    * Gets all the info about user with given Email and Password
    * @return User [associative array]
    */
    public static function getUser($email, $password)
    {
        $db = DBConnect::getInstance();
        return $db->getUser($email, $password);
    }

    /**
    * Gets all the info about user with given ID
    * @param int $id id of the user with the name wanted
    * @return string
    */
    public static function getUserNameByID($id)
    {
        $db = DBConnect::getInstance();
        return $db->getUserNameByID($id);
    }
    
    /**
    * Change the name of a user by his ID
    * @param string $newName The new name we want to give the user
    * @return bool
    */
    public static function changeName($newName, $userId)
    {
        $db = DBConnect::getInstance();
        return $db->changeName($newName, $userId);
    }
    
    /**
    * Change the password of a user
    * @param string $password password passed as md5()
    * @return bool 
    */
    public static function changePassword($password, $userId)
    {
        $db = DBConnect::getInstance();
        return $db->changePassword($password, $userId);
    }
    
    /**
    * Deletes the account of passed user
    * @param User $user User that will be deleted
    * @return bool
    */
    public static function deleteProfile(User $user)
    {
        $db = DBConnect::getInstance();
        return $db->deleteProfile($user);
    }

    public static function getChatUsers($user_id)
     {
         $db = DBConnect::getInstance();
         return $db->getChatUsers($user_id);
     }

     public static function getUserMessages($receiver_id, $loggedUser_id)
     {
         $db = DBConnect::getInstance();
         return $db->getUserMessages($receiver_id, $loggedUser_id);
     }

     public static function sendMessage($sender_id, $receiver_id, $content)
     {
         $db = DBConnect::getInstance();
         return $db->sendMessage($sender_id, $receiver_id, $content);
     }







    //88888888888888888888888888
    // POST FUNCTIONS
    //88888888888888888888888888

    public static function makePost(Post $post)
    {
        $db = DBConnect::getInstance();
        return $db->makePost($post->getUser(), $post->getTitle(), $post->getContent(), $post->getCategory());
    }

    public static function getCategories()
    {
        $db = DBConnect::getInstance();
        return $db->getCategories();
    }

    /**
    * Get name of category with given ID
    * @param int $cat_id Category_Id
    * @return string Name of category
    */
    public static function getCategoryName($cat_id)
    {
        $db = DBConnect::getInstance();
        return $db->getCategoryName($cat_id);
    }

    /**
    * Get all the posts in the database.
    * @return .mysqli_result [use fetch_assoc() to get row]
    */
    public static function getPosts()
    {
        $db = DBConnect::getInstance();
        return $db->getPosts();
    }

    /**
    * Get all info about a post with given ID
    * @param int $id id of the post we want info of
    * @return array associative array || row with the fields of the post object
    */
    public static function getPostById($id)
    {
        $db = DBConnect::getInstance();
        return $db->getPostById($id);
    }

    public static function getSearchedPosts($search)
    {
        $db = DBConnect::getInstance();
        return $db->getSearchedPosts($search);
    }
}
