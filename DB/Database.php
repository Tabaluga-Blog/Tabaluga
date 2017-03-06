<?php

namespace DB;

use Models\User as User;
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

    public static function makePost(User $user, string $title, string $content, int $category)
    {
        $db = DBConnect::getInstance();
        return $db->makePost($user, $title, $content, $category);
    }

    public static function editProfile($name, $password)
    {
        $db = DBConnect::getInstance();
        return $db->editProfile($name, $password);
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
}
