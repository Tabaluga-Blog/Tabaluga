<?php
//connect to db -> include where connection is needed

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$db_hostname="localhost";
$db_username="root";
$db_password="";
$db_database="tabalugadb";

$mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$mysqli->set_charset("utf8");

if ($mysqli -> connect_errno){ die('Cannot connect to MySQL'); }

?>