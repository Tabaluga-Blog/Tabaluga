<?php

use Models\User;
use DB\Database;
require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

session_start();
$message = "";


if (isset($_SESSION['user'])) {

    header('Location: Home.php');
    exit;
}

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
?>


<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title></title>

</head>

<body>

<div class="login">
    <header class="header">
        <span class="text"> LOGIN </span>
        <span class="loader"></span>
    </header>

    <form class="form" action="Login.php" method="POST">
        <input class="input" type="email" placeholder="Email" name="email">
        <input class="input" type="password" placeholder="Password" name="password">
        <button class="btn" type="submit">Go</button>

        <div class="error">
            <?php echo $message; ?>
        </div>
    </form>


</div>





</body>
</html>
