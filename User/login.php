<?php

use Services\UserServices\LoginService;

include_once '../Access/isLogged.php';
include_once '../Services/UserServices/LoginService.php';

$message = "";

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginService = new LoginService();

    $message = $loginService->login($email, $password);

}

require_once "../header.php";
require_once '../views/login.view.php';
require_once "../footer.php" ?>

</body>
</html>