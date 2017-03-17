<?php

use Services\PostServices\PostService;

require_once("../Data/User.php");
require_once('../Data/Post.php');
require_once "../Services/PostServices/PostService.php";
require_once '../Access/notLogged.php';

require_once ("../header.php");
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/sidebar.css">
</head>
<body>

<!-- ===================================================== -->

<h1 class="text-center">
    Categories
</h1>

<div class="post-container">
    <!-- $post should be changed to an object of type Post -->
    <?php
        if (!isset($_GET['category'])) {
            foreach ($allCategories as $category) {
                ?> <a href="/Post/category.php?category=<?= $category['id'] ?>" class="btn btn-success btn-lg xlarge btn-block"><?= $category['name'] ?></a> <?php
            }
        } else if ($_GET['category'] >= 1 && $_GET['category'] <= 8) { ?>
            
            <div class="post-container">
                <?php
                $ps = new PostService();
            
                $allPosts = $ps->getPostsByCategoryId($_GET['category']);
            
                require_once "../views/showPosts.view.php";
                ?>
            </div>
    <?php  } ?>
</div>
<br>