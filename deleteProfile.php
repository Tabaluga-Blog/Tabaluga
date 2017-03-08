<?php
use DB\Database;

require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require_once 'notLogged.php';

$message = "";
if (isset($_POST['delete'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    if ($email == $_SESSION['user']->getEmail() &&
        $password == md5($_SESSION['user']->getPassword())
    ) { 
        if (Database::deleteProfile($_SESSION['user'])) {
            session_destroy();
            header('Location: index.php');
        } else {
            echo "<h4 class=\"text-center\">Something went terribly wrong!</h4>";
        }
    }
}

include_once 'header.php';
require_once 'views/deleteProfile.view.php';
require_once "footer.php";