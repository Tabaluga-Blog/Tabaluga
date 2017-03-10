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
    
    //IF ACCOUNT IS DELETED SKIP TO THE 'skipLog' label
    if ($userInfo['deleted_at'] != NULL) {
        $message = 'Account is deleted';
        goto skipLog;
    }
    
    if ($userInfo) {
        try
        {
            $user = new User($email, $userInfo['name'], $password);
            $_SESSION['user'] = $user;
            header("location: Home.php");
            exit();
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }

    } else {
        $message = "Incorrect email or password";
    }
}

//SKIPlOG LABEL
skipLog:

require_once "Header.php";
require_once 'views/login.view.php';

?>
<!-- ========================================== -->
<?php require_once "footer.php" ?>
</body>
</html>