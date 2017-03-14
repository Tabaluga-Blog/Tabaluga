<?php

namespace Services\UserServices;


use Data\User;

require_once( __DIR__ . "/../../Data/User.php");
require_once( __DIR__ . "/../UserServices/UserService.php");
require_once( __DIR__ . "/../../DB/DBConnect.php");
require_once  __DIR__ . '/../../Access/notLogged.php';


class EditProfileService
{

    public function changePassword($oldPassword, $newPassword, $confirmNewPassword, $userId)
    {
        $userService = new UserService();

        $error = false;
        $changePasswordError = "";

        //print_r($_SESSION['user']);exit;
        $userId = $_SESSION['user']->getId();

        //var_dump($userId); exit;

        if (md5($oldPassword) != $_SESSION['user']->getPassword()) {
            $changePasswordError .= "That's not your current password!<br>";
            $error = true;
        }
        if (strlen($newPassword) < 5) {
            $changePasswordError .= "New Password is too short!<br>";
            $error = true;
        }
        if ($newPassword != $confirmNewPassword) {
            $changePasswordError .= "Passwords does not match!<br>";
            $error = true;
        }
        if ($error == false) {

            $userService->changePassword(md5($newPassword), $_SESSION['user']->getId());
            header("Location: ../../User/logout.php");
        }

        return $changePasswordError;
    }

    public function changeName($newName)
    {
        $userService = new UserService();

        $error = false;
        $changeNameError = "";

        if (strlen($newName) < 2) {
            $changeNameError = "Name should be at least 2 characters";

            $error = true;
        }
        if ($error == false) {

            $userService->changeName($newName, $_SESSION['user']->getId());
            $_SESSION['user']->setName($newName);
        }
    }
}