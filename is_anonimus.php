//check if user is registered

<?php
if (!isset($_SESSION['user_id'])) {

    ?>
    <p>This page is only for registered users.</p>
    <a href="register.php">
        <p>
            Register
        </p>
    </a>
    <a href="index.php">
        <p>
            LOGIN
        </p>
    </a>
    <a href="">
        <p>
            Continue without login
        </p>
    </a>

    <?php

    exit;
}
?>