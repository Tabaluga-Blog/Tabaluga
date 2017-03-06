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
    Newest posts
</h1>

<div class="post-conatiner">
    <!-- $post should be changed to an object of type Post -->
    <?php while($post = $posts->fetch_assoc()) { ?>
        <div class="panel post panel-default">
            <a href="#" class="panel-heading fill">
                <h4>
                    <?= $post['title'] ?>
                    <span class="pull-right">
                        <!-- Change to the category of the post -->
                        <?=  "Gaming" ?>
                    </span>
                </h4>
            </a>
            <div class="panel-body">
                <p class="mediumText">
                    <?= $post['content']; ?>
                </p>
            </div>
            <div class="panel-footer">
                <h5 class="">
                    <?= $post['date']; ?>
                    <a href="#" class="pull-right">
                        <!-- Change to the actual creator of the post -->
                        <?= 'Jack' ?>
                    </a>
                </h5>
            </div>
        </div>
    <?php } ?>
</div>


<?php require_once "footer.php" ?>
