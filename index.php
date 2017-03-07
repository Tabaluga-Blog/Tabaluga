<?php


require 'isLogged.php';
if (isset($_SESSION['user'])) {
    header("Location: Home.php");
    exit;
}
 
require_once "header.php" ?>
        
        <style media="screen">
            body {padding: 100px 10px 0px 10px; min-height: auto}
        </style>
        <center>
            <div class="jumbotron">
                <h1 class="display-3">Hello To Tabaluga Blog!</h1>
                <p class="lead">This is a simple Blog. Here you can share your interests and see other people posts</p>
                <hr class="my-4">
                <p>If you are bored or you're free, share us the things you love ;)</p>
                <p class="lead">
                    <a class="btn btn-success btn-lg" href="register.php" role="button">Register</a>
                </p>
            </div>
        </center>
        <?php require_once "footer.php" ?>
    </body>
</html>
