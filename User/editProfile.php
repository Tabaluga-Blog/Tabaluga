<?php

use Services\UserServices\EditProfileService;
use Data\User;

require_once '../Data/User.php';
require_once '../Services/UserServices/EditProfileService.php';
require_once '../Access/notLogged.php';


include_once '../header.php';

if (isset($_POST['changePassword'])) {

    $editService = new EditProfileService();

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    $error = $editService->changePassword($oldPassword, $newPassword, $confirmNewPassword);
}

if (isset($_POST['changeName'])) {

    $editService = new EditProfileService();

    $newName = $_POST['newName'];

    $error = $editService->changeName($newName);
}

require_once '../views/editProfile.view.php';
require_once "../footer.php";