<?php

use Models\User;
use DB\Database;
require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

include_once 'isLogged.php';

$message = "";

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userInfo = Database::getUser($email, $password);

    if ($userInfo) {

        $user = new User($email, $userInfo['name'], $password);
        $_SESSION['user'] = $user;

        //$_SESSION['user_id'] = $userInfo['id'];
        //$_SESSION['name'] = $userInfo['name'];

        header('Location: Home.php'); exit;
    } else {
        $message = "Incorrect email or password";
    }
}

require_once "Header.php" ?>

<!-- ========================================== -->

<form class="medium" action="login.php" method="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input class="input form-control" type="email" name="email" placeholder="johnSmith@example.com">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="input form-control" type="password" name="password">
            </div>
            <button type="submit" class="btn btn-success fill"><span>Log In</span></button>
            </div>
        </div>
</form>

</body>
</html>







