<?php

session_start();

if (isset($_SESSION['user'])) {

    header('Location: Home.php');
    exit;
}