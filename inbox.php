<?php

use DB\Database;
use Models\User;
require_once("DB/DBConnect.php");
require_once("DB/Database.php");
require_once("Models/User.php");

require 'notLogged.php';
require_once "header.php";

$chatUsers = Database::getChatUsers($_SESSION['user']->getId());

foreach ($chatUsers as $chatUser) {
    ?>
    <div class="bigText">
        <a href="/chat.php?id=<?= $chatUser['id'] ?>" class="panel-heading fill"> <?= $chatUser['name'] ?> </a>
    </div>

<?php
}

require_once "footer.php";
