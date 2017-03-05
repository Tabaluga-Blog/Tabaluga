<?php
use Models\User;
use DB\Database;

require_once("Models/User.php");
require_once("DB/DBConnect.php");
require_once("DB/Database.php");

require 'notLogged.php';

$posts = Database::getPosts();

require_once "header.php" ?>

<!-- ===================================================== -->

<h1 class="text-center">
    New
</h1>

<div class="post-conatiner">
    <?php while($post = $posts->fetch_assoc()) { ?>
        <div class="panel post panel-default">
            <div class="panel-heading">
                <h4>
                    <?= $post['title'] ?>
                </h4>
            </div>
            <div class="panel-body">
                <p class="mediumText">
                    <?= $post['content']; ?>
                </p>
            </div>
            <div class="panel-footer">
                <h5 class="">
                    <?= $post['date']; ?>
                    <a href="#" class="pull-right">
                        <?= 'Jack' ?>
                    </a>
                </h5>
            </div>
        </div>
    <?php } ?>
</div>


<?php require_once "footer.php" ?>
