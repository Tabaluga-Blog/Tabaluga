<?php
use Models\User;
use DB\Database;
require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

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
        //create user
        try{
            $user = new User($email, $name, $password);
        }
        catch (Exception $e){
            $message = $e->getMessage();
        }

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

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Register</title>
</head>
<body>
<form id='register' action='register.php' method='post'>
    <fieldset >

        <legend><h1>Register</h1></legend>

        <label for='name'> Your Full Name: </label>
        <input type='text' name='name' id='name' maxlength="50" <?php if (isset($_POST['name'])) {echo 'value =' . "'" . $_POST['name'] . "'";} ?>/>

        <label for='email' >Email Address: </label>
        <input type='email' name='email' id='email' maxlength="50" <?php if (isset($_POST['email'])) {echo 'value =' . "'" . $_POST['email'] . "'";} ?> />

        <label for='password' >Password:</label>
        <input type='password' name='password' id='password' maxlength="50" />

        <label for='confirm_password' >Confirm Password:</label>
        <input type='password' name='confirm_password' id='confirm_password' maxlength="50" />


        <input class="button" type='submit' name='submit' value='Submit' />

        <div>
            <?php echo $message; ?>
        </div>

    </fieldset>
</form>
</body>
</html>
