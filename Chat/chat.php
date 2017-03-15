<?php

use Services\MessageService;

require_once("../Data/User.php");
require_once('../Data/Post.php');
require_once("../DB/DBConnect.php");
require_once '../Services/MessageService.php';
require_once '../Access/notLogged.php';
require_once "../header.php";


$receiver_id = intval($_GET['id']);

$loggedUser_id = $_SESSION['user']->getId();

$ms = new MessageService();

if (isset($_POST['chat']) && !empty(trim($_POST['content'])))
{
    $content = $_POST['content'];
    $result = $ms->sendMessage($loggedUser_id, $receiver_id, $content);
}

$messages = $ms->getUserMessages($receiver_id, $loggedUser_id);

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
