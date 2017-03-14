<?php
require_once ("../Access/notLogged.php");
require_once ("../Adapter/DatabaseConnection.php");

require '../Access/notLogged.php';
require_once "../header.php";

$chatUsers = Database::getChatUsers($_SESSION['user']->getId());

foreach ($chatUsers as $chatUser) {
    ?>
    <div class="bigText">
        <a href="/Chat/chat.php?id=<?= $chatUser['id'] ?>" class="panel-heading fill"> <?= $chatUser['name'] ?> </a>
    </div>

<?php
}

require_once "../footer.php";
