<?php
/**
 * Created by PhpStorm.
 * User: Gabi
 * Date: 21-Feb-17
 * Time: 20:06
 */

namespace DB;

use Models\User;
require_once "DBConnect.php";

class Database
{
    public static function getUser(User $user)
    {
        $db = DBConnect::getInstance();
        return $db->getUser($user->getEmail());
    }

    public static function addUser(User $user)
    {
        $db = DBConnect::getInstance();
        return $db->addUser($user->getEmail(), $user->getName(), $user->getPassword());
    }
}