<?php

use Models\Post as Post;
use DB\Database;

require_once("Models/User.php");
require_once('Models/Post.php');
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';
require_once "header.php";


    $receiver_id = intval($_GET['id']);

    $loggedUser_id = $_SESSION['user']->getId();



if (isset($_POST['chat']) && !empty(trim($_POST['content'])))
{
    $content = $_POST['content'];
    $result = Database::sendMessage($loggedUser_id, $receiver_id, $content);

    if (!$result){
        ?>
            <div>
               this msg cannot be send.
            </div>
        <?php
    }
}

$messages = Database::getUserMessages($receiver_id, $loggedUser_id);

foreach ($messages as $msg)
{
    ?>
    <div>
        <span class="mediumText"> <?= $msg['name'] . " : " ?>
        </span> <span class="smallText"> <?=  $msg['content'] ?></span>
    </div>

    <?php
}

?>



<form action="chat.php?id=<?=$receiver_id?>" method="post">
    <input type="text" name="content" placeholder="content:">

    <input type="submit" name="chat" value="Send" >
</form>
