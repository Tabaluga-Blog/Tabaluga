<?php 
use Models\User;
use DB\Database;
require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");
require 'notLogged.php';

require_once 'header.php';
// require_once 'views/post.view.php';
?>
    </body>
</html>


<?php 


if (isset($_POST['submit'])) {
    $user = $_SESSION['user'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = intval($_POST['category']);
    $result = Database::makePost($user, $title, $content, (int)$category);
    
    echo $result;
    
    if ($result) {
        header("location: index.php");
    } else {
        die("Something went wrong! :(");
    }
}