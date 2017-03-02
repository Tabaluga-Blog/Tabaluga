<?php

use Models\User;

require_once("Models/User.php");

require_once 'notLogged.php';
include_once 'header.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/header.css">
        <link rel="stylesheet" href="styles/sidebar.css">
    </head>
    <body>
        <?php include_once 'header.php'; ?>
        
        <form id='' action='' method='post'>
            <fieldset>
                <legend><h1>Change your profile details:</h1></legend>
    
                <label for='name'> Name: </label>
                <input type='text' name='name' id='name' maxlength="50" <?php if (isset($_SESSION['user'])) {echo 'value =' . "'" . $_SESSION['user']->getName() . "'";} ?>/>
    
                <label for='email' >Email Address: </label>
                <input type='email' name='email' id='email' maxlength="50" <?php if (isset($_SESSION['user'])) {echo 'value =' . "'" . $_SESSION['user']->getEmail() . "'";} ?> />
    
                <label for='password' >Password:</label>
                <input type='password' name='password' id='password' maxlength="50" />
    
                <label for='confirm_password' >Confirm Password:</label>
                <input type='password' name='confirm_password' id='confirm_password' maxlength="50" />
    
    
                <input class="button" type='submit' name='submit' value='Submit' />
    
            </fieldset>
        </form>
        <?php require_once "footer.php" ?>
    </body>
</html>