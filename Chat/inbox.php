<?php

use Adapter\DatabaseConnection;

//require_once("DB/DBConnect.php");
//require_once("DB/Database.php");
//require_once("Data/User.php");
require_once ("../Access/notLogged.php");
require_once ("../Adapter/DatabaseConnection.php");

require 'notLogged.php';
require_once "header.php";

$chatUsers = DatabaseConnection::getChatUsers($_SESSION['user']->getId());

foreach ($chatUsers as $chatUser) {
    ?>
    <div class="bigText">
        <a href="/Chat/chat.php?id=<?= $chatUser['id'] ?>" class="panel-heading fill"> <?= $chatUser['name'] ?> </a>
    </div>

<?php
}

require_once "footer.php";
