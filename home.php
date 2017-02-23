<?php


session_start();

if (!isset($_SESSION['user'])) {

    header('Location: Login.php');
    exit;
}

echo "hellooooooo";


?>


<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title></title>

</head>

<body>

<div class="login">

    <p class="logout">
        <a href="logout.php">
    Logout
        </a>
    </p>



</div>





</body>
</html>
