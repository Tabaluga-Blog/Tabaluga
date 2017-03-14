<?php

namespace Services\UserServices;

require_once(__DIR__ . "/../../Data/User.php");
require_once(__DIR__ . "/../../DB/DBConnect.php");

require_once (__DIR__ . '/../../Access/notLogged.php');

class DeleteProfileService
{
    public function deleteProfile($email, $password)
    {
        $userService = new UserService();

        if ($email == $_SESSION['user']->getEmail() &&
            $password == $_SESSION['user']->getPassword()
        ) {
            if ($userService->deleteProfile($_SESSION['user']->getId())) {
                session_destroy();
                header('Location: index.php');
            } else {
                echo "<h4 class=\"text-center\">Something went terribly wrong!</h4>";
            }
        }
    }
}