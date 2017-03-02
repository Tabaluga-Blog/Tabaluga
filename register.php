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

require_once "Header.php" 

?>
    <form class="large" action='register.php' method="POST">
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
            <input class="form-control" type="password" name="confirmPassword" placeholder="Confirm password">
        </div>

        <button class="btn btn-success" type="submit" name="submit"><span>Submit</span></button>
    </form>
</body>
</html>
