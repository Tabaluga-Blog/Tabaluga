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
    
    $userInfo = Database::getUser($email, md5($password));
    
    //IF ACCOUNT IS DELETED SKIP TO THE 'skipLog' label
    if ($userInfo['deleted_at'] != NULL) {
        $message = 'Account is deleted';

    } else if ($userInfo) {
        try
        {
            $user = new User($email, $userInfo['name'], $password);
            $_SESSION['user'] = $user;

        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }

        header('Location: Home.php'); exit;
    } else {
        $message = "Incorrect email or password";
    }
}



require_once "Header.php";
require_once 'views/login.view.php';

?>
<!-- ========================================== -->
<?php require_once "footer.php" ?>
</body>
</html>