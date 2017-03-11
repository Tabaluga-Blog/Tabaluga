<?php

use DB\Database;

require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require_once 'notLogged.php';

if (isset($_POST['changePassword'])) {
    $Error = false;
    $changePasswordError = "";
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if (md5($oldPassword) != $_SESSION['user']->getPassword()) {
        $changePasswordError .= "That's not your current password!<br>";
        $Error = true;
    }
    if (strlen($newPassword) < 5) {
        $changePasswordError .= "New Password is too short!<br>";
        $Error = true;
    }
    if ($newPassword != $confirmNewPassword) {
        $changePasswordError .= "Passwords does not match!<br>";
        $Error = true;
    }
    if ($Error == false) {
        Database::changePassword(md5($newPassword), $_SESSION['user']->getId());
        header("Location: logout.php");
    }
}

if (isset($_POST['changeName'])) {
    $Error = false;
    $changeNameError = "";
    $newName = $_POST['newName'];
    
    if (strlen($newName) < 2) {
        $changeNameError = "Name should be at least 2 characters";
        $Error = true;
    }
    if ($Error == false) {
        Database::changeName($newName, $_SESSION['user']->getId());
        $_SESSION['user']->setName($newName);
    }
    
}

include_once 'header.php';
require_once 'views/editProfile.view.php';
require_once "footer.php";