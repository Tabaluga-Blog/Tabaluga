<?php

Use Models\User;
require_once ("Models/User.php");
if (!session_start()) {
    session_start();
}

if (isset($_SESSION['user'])) {
    header("Location: Home.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/sidebar.css">
    </head>
    <body>
        <?php require_once "header.php" ?>
        <center>
            <div class="jumbotron">
                <h1 class="display-3">Hello To Tabaluga Blog!</h1>
                <p class="lead">This is a simple Blog. Here you can share your interests and see other people posts</p>
                <hr class="my-4">
                <p>If you are bored or you're free, share us the things you love ;)</p>
                <p class="lead">
                    <a class="btn btn-success btn-lg" href="register.php" role="button">Register</a>
                </p>
            </div>
        </center>
        <?php require_once "footer.php" ?>
    </body>
</html>
