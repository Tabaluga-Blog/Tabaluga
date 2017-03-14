<?php

use Services\UserServices\DeleteProfileService;

require_once '../Services/UserServices/DeleteProfileService.php';
include_once '../header.php';
require_once '../Access/notLogged.php';

$message = "";
if (isset($_POST['delete'])) {
    $email = $_POST['email'];
    $password =md5($_POST['password']);

    $deleteService = new DeleteProfileService();

    $deleteService->deleteProfile($email, $password);
}

require_once '../Views/deleteProfile.view.php';
require_once "../footer.php";