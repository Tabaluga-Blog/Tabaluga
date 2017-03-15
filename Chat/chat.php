<?php

use Services\MessageService;

use Services\UserServices\UserService;

require_once("../Data/User.php");
require_once('../Data/Post.php');
require_once("../DB/DBConnect.php");
require_once '../Services/UserServices/UserService.php';
require_once '../Services/MessageService.php';
require_once '../Access/notLogged.php';
require_once "../header.php";



$receiver_id = intval($_GET['id']);
$loggedUser_id = $_SESSION['user']->getId();

$us = new UserService();
$ms = new MessageService();

$receiver_name = $us->getUserNameByID($receiver_id);

if (isset($_POST['chat']) && !empty(trim($_POST['content'])))
{
    $content = htmlentities($_POST['content']);
    $result = $ms->sendMessage($loggedUser_id, $receiver_id, $content);
}

$messages = $ms->getUserMessages($receiver_id, $loggedUser_id);


require_once './../views/chat.view.php';
?>


