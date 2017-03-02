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
        
        <form class="xlarge" action="post.php" method="post">
            <div class="panel panel-default">
                <!-- Title -->
                <div class="panel-heading">
                    <h2 class="panel-title">
                        Post title:
                        <?php if (  isset($_POST['submit']) &&
                                    ($_POST['title'] == '' ||
                                    strlen($_POST['title']) < 10)) {
                            echo '<span class="error">Title is empty or below 10 symbols<span>';
                        } ?>
                    </h2>    
                </div>
                
                <input required type="text" name="title" class="form-control noRound" placeholder="Top 10 coolest cats!">
                
                <!-- Content -->
                <div class="panel-heading">
                    <h3 class="panel-title">Content:</h3> 
                </div>
                <textarea required type="text" name="content" class="form-control noResize noRound" rows="12" placeholder="1. Jimmy &#10;2. Roger &#10;3. Etc. . ."></textarea>
                
                <div class="panel-body">
                    <select required class="custom-select fill bigText" name="category">
                        <option disabled selected>Categories:</option>
                        <option value="2">Software</option>
                        <option value="3">Hardware</option>
                        <option value="4">Game Development</option>
                        <option value="5">Android</option>
                        <option value="6">iOS</option>
                        <option value="7">Gaming</option>
                        <option value="8">Robotics</option>
                        <option value="1">Other</option>
                    </select>
                </div>
                
                <input class="quarterMissing bigText btn btn-success" type="submit" name="submit" value="Make post">
            </div>
        </form>
        
        

<?php 

require 'footer.php';

if (isset($_POST['submit'])) {
    $user = $_SESSION['user'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = intval($_POST['category']);
    
    echo var_dump($_SESSION['user']->getId());
    
    $result = Database::makePost($user, $title, $content, (int)$category);
    
    if ($result) {
        header("location: Home.php");
    } else {
        die("Something went wrong! :(");
    }
}