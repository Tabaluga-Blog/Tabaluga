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

require_once "Header.php" ;
require_once 'views/register.view.php';
?>
<?php require_once "footer.php" ?>
</body>
</html>
