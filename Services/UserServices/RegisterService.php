<?php

namespace Services\UserServices;

use Data\User;
use Exception;
use Services\UserServices\UserServicesInterfaces\RegisterServiceInterface;

require_once("../Access/isLogged.php");
require_once("../Data/User.php");
require_once("UserService.php");
require_once (__DIR__ . "/../UserServices/UserServicesInterfaces/RegisterServiceInterface.php");

class RegisterService implements RegisterServiceInterface
{
    public function register($email, $name, $password, $confirmPassword)
    {
        $userService = new UserService();

        $message = "";

        if($email == '' ||
            $name == '' ||
            $password == ''||
            $confirmPassword == '')
        {
            $message = "please fill the empty field.";
        }
        else if ( $password != $confirmPassword) {
            $message = "Password does not match.";
        }
        else
        {
            $user = null;

            //create user
            try{
                $user = new User($email, $name, $password);
            }
            catch (Exception $e){
                $message = $e->getMessage();
            }

            if ($user){
                //check if user exists
                $result = $userService->getEmail($user->getEmail());

                if ($result) {
                    $message = "Email already used";
                }
                else {

                    //register user
                    $result = $userService->addUser($user);

                    if($result)
                    {
                        header('Location: login.php');
                    }
                    else {
                        $message = "Insert post failed.";
                    }
                }
            }
        }


        return $message;
    }
}