<?php

use Services\MessageService;

require_once("../DB/DBConnect.php");
require_once("../Data/User.php");
require_once("../Services/MessageService.php");

require_once __DIR__ . '/../Access/notLogged.php';
require_once __DIR__ . "/../header.php";

$ms = new MessageService();

$chatUsers = $ms->getChatUsers($_SESSION['user']->getId());

foreach ($chatUsers as $chatUser) {
    ?>
    <div class="bigText">
        <a href="/Chat/chat.php?id=<?= $chatUser['id'] ?>" class="panel-heading fill"> <?= $chatUser['name'] ?> </a>
    </div>

<?php
}

require_once "../footer.php";
