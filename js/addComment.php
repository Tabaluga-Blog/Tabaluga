<?php 

use DB\Database;
use Models\Comment as Comment;

require_once("../DB/Database.php");
require_once("../DB/DBConnect.php");
require_once '../Models/Comment.php';

$post_id = $_POST['id'];
$sender = $_POST['sender'];
$content = $_POST['content'];

$comment = new Comment($content, $post_id, $sender);

$result = Database::addComment($comment);

var_dump($result);
