<?php

use Models\User;
use DB\Database;

require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require_once 'notLogged.php';

if (isset($_POST['submit'])) {
    $changeFullName = $_POST['changeFullName'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    
    if ($newPassword != $confirmNewPassword) {
        $message = "Password does not match.";
    }
    //TODO: Add Functionality..
}

include_once 'header.php';
require_once 'views/editProfile.view.php';
require_once "footer.php";



?>

