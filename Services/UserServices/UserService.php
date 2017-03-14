<?php

namespace Services\UserServices;


use DB\DBConnect;
use Data\User;

require_once (__DIR__ . "/../../DB/DBConnect.php");

class UserService
{
    public function getEmail($email)
    {
        $sql = 'SELECT * FROM users where email = "'.  $email . '"';

        $result = DBConnect::db()->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }

        return false;
    }

    public function addUser(User $user)
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $stmt = DBConnect::db()->prepare("INSERT INTO users (email, name, password)
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

        $result = DBConnect::db()->query($sql);

        $userInfo = $result->fetch_assoc();

        return $userInfo;
    }

    public function changeName($newName, $userId)
    {
        $sql = "UPDATE users SET name = '$newName' WHERE id = '$userId'";
        $result = DBConnect::db()->query($sql);
        return $result;
    }

    public function changePassword($password, $userId)
    {
        $sql = ("UPDATE users SET password = '$password' WHERE id = '$userId'");
        $result = DBConnect::db()->query($sql);
        return $result;
    }

    public function deleteProfile($userId)
    {
        $now = date("Y-m-d H:i:s");

        $result = DBConnect::db()->query("UPDATE users SET deleted_at = '$now' WHERE id='{$userId}'");

        return $result;
    }

    public function getUserNameByID($id)
    {
        $sql = "SELECT name FROM users WHERE id={$id} LIMIT 1";

        $query = DBConnect::db()->query($sql);
        $name = $query->fetch_assoc()['name'];

        return $name;
    }


}