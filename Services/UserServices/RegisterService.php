<?php

namespace Services\UserServices;

use Data\User;
use Exception;

require_once("../Access/isLogged.php");
require_once("../Data/User.php");
require_once("UserService.php");

class RegisterService
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

    private function passwordMatch($password, $confirmPassword)
    {
        return $password != $confirmPassword;
    }
}