<?php

use Models\User;

require_once("Models/User.php");

require_once 'notLogged.php';
include_once 'header.php';

?>






<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>

<body>
<?php require_once "Header.php" ?>

<div style="padding: 300px;">

    <form id='' action='' method='post'>
        <fieldset >
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


</div>





</body>
</html>
