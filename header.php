<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabaluga</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>

<body>
<header>
    
    <div class="left">
        <img class="logo" src="images/Logo.png">
        <a href="index.php"><h1 class="title">Tabaluga</h1></a>
    </div>

    <div class="right">
        <ul>

            <!-- If logged -->
            <?php if(isset($_SESSION['user'])) { ?>
                <textarea class="searchbar" maxlength="40" placeholder="Find"></textarea>
                <a href="profile.php"><?= $_SESSION['user']->getName(); ?></a>
                <a href="logout.php">Log out</a>

            <?php }  ?>


        </ul>
    </div>
</header>

<?php require 'Sidebar.php'; ?>
