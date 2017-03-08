<?php
use Models\User;
use DB\Database;

require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require_once 'notLogged.php';

$message = "";
if (isset($_POST['delete'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

    if (Database::deleteProfile($email, $password, $_SESSION['user']->getId())) {
        session_destroy();
        header('Location: index.php');
    }
}

include_once 'header.php';
require_once 'views/deleteProfile.view.php';
require_once "footer.php";