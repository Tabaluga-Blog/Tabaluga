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
    $name = $_POST['fullName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>
<body>
    <?php require_once "Header.php" ?>
    <form action='register.php' method="POST">
        <p style="color:red"> <?php echo $message . "<br>" ?> </p>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" placeholder="JohnSmith@example.com">
        </div>
        
        <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input class="form-control" type="text" name="fullName" placeholder="John Smith">
        </div>

        <div class="password">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" placeholder="More than 6 symbols">
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password:</label>
            <input class="form-control" type="password" name="confirmPassword">
        </div>

        <button class="btn btn-success" type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
