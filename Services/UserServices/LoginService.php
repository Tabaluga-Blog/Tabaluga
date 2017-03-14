<?php

namespace Services\UserServices;

use Data\User;
use Exception;

require_once("../Access/isLogged.php");
require_once("../Data/User.php");
require_once("UserService.php");

class LoginService
{
    public function login($email, $password)
    {
        $userService = new UserService();

        $mdPass = md5($password);
        $userInfo = $userService->getUser($email, $mdPass);

        $message = "";

        if ($userInfo['deleted_at'] != NULL) {
            $message = 'Account is deleted';

        } else if ($userInfo) {
            try
            {
                $user = new User($email, $userInfo['name'], $password);
                $_SESSION['user'] = $user;
                $id = $userService->getUser($user->getEmail(), $user->getPassword())['id'];
                $_SESSION['user']->setId($id);

                header("location: /../Home.php");
                exit();
            }
            catch(Exception $e)
            {
                $message = $e->getMessage();
            }

            header('Location: ../Home.php'); exit;
        } else {
            $message = "Incorrect email or password";
        }

        return $message;
    }
}