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
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php require_once "Header.php" ?>
<ul style="padding: 300px;">
    <center>
        <form class="form-horizontal" action='login.php' method="POST">
            <fieldset>
                <div id="legend">
                    <legend class="">Login</legend>
                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                    </div>
                </div>
                    <br>
                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Login</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </center>
</ul>

</body>
</html>
