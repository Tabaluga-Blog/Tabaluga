<?php
use Models\User;
use DB\Database;
require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

include_once 'isLogged.php';

$message = "";

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if($email == '' ||
        $name == '' ||
        $password == ''||
        $confirmPassword == '')
    {
        $message = "please fill the empty field.";
    }
    else if ( $password != $confirmPassword) {
        $message = "Password does not match.";
    }
    else
    {
        $user = null;

        //create user
        try{
            $user = new User($email, $name, $password);
        }
        catch (Exception $e){
            $message = $e->getMessage();
        }

        if ($user){
            //check if user exists
            $result = Database::getEmail($user);
            if ($result) {
                $message = "Email already used";
            }
            else {

                //register user
                $result = Database::addUser($user);

                if($result)
                {
                    header('Location: login.php');
                }
                else {
                    $message = "Insert post failed.";
                }
            }
        }


    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Register</title>
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
        <form class="form-horizontal" action='register.php' method="POST">
            <fieldset>
                <div id="legend">
                    <legend class="">Register</legend>
                </div>
                <div class="control-group">
                    <!-- Full Name -->
                    <label class="control-label"  for="fullName">Full Name</label>
                    <div class="controls">
                        <input type="text" id="fullName" name="fullName" placeholder="" class="input-xlarge">
                        <p class="help-block">Full name should be at least 2 characters</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- E-mail -->
                    <label class="control-label" for="email">E-mail</label>
                    <div class="controls">
                        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                        <p class="help-block">Please provide your E-mail</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                        <p class="help-block">Password should be at least 5 characters</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password -->
                    <label class="control-label"  for="confirmPassword">Password (Confirm)</label>
                    <div class="controls">
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="" class="input-xlarge">
                        <p class="help-block">Please confirm password</p>
                    </div>
                </div>

                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>
        </center>
    </ul>
</body>
</html>
