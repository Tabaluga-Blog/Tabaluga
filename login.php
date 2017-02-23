<?php

use Models\User;
use DB\Database;
require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");


$message = "";



if (isset($_SESSION['user_id'])) {

    header('Location: home_page.php');
    exit;
}

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = 'SELECT * FROM users where email = "' . $email . '" and password = "' . md5($password) . '"';

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header('Location: home_page.php');
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

    <form class="form" action="login.php" method="POST">
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
