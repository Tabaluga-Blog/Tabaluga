<?php
use Models\User;
use DB\Database;

require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';

$posts = Database::getPosts();

require_once "header.php" ?>

<!-- ===================================================== -->

<?php while($post = $posts->fetch_assoc()) { ?>
    <pre>
        <?php echo var_dump($post); ?>
    </pre>
<?php } ?>



<?php require_once "footer.php" ?>
</body>
</html>
