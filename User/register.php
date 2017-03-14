<?php

use Services\UserServices\RegisterService;

include_once '../Access/isLogged.php';
include_once '../Services/UserServices/RegisterService.php';

require_once "../header.php";

$message = "";


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $name = $_POST['fullName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $registerService = new RegisterService();

    $message = $registerService->register($email, $name, $password, $confirmPassword);
}


require_once '../views/register.view.php';
require_once "../footer.php" ?>

</body>
</html>
