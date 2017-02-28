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
?>


<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>

<body>
<?php require_once "Header.php" ?>

<form action="login.php" method="post">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input class="input form-control" type="email" name="email" placeholder="johnSmith@example.com">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input class="input form-control" type="password" name="password">
    </div>
    <button type="submit" class="btn btn-default">Log In</button>
</form>

</body>
</html>







