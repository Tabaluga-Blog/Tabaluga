<?php

use Services\MessageService;

require_once("../DB/DBConnect.php");
require_once("../Data/User.php");
require_once("../Services/MessageService.php");

require_once __DIR__ . '/../Access/notLogged.php';
require_once __DIR__ . "/../header.php";

$ms = new MessageService();

$chatUsers = $ms->getChatUsers($_SESSION['user']->getId());

echo "<div class=\"panel panel-default medium inbox\">";
foreach ($chatUsers as $chatUser) {
    ?>
        <a href="/Chat/chat.php?id=<?= $chatUser['id'] ?>" class="oldChat bigText"> <?= $chatUser['name'] ?> </a>
<?php
}
echo "</div>";
require_once "../footer.php";
