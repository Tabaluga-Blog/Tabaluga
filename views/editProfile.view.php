<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/sidebar.css">
</head>
<body>
<?php include_once 'header.php'; $message = ""; ?>
<center>
    <h3>Here you can change your profile details...</h3>
    <form class="large" action='editProfile.php' method="POST">
        <p style="color:red"> <?php echo $message . "<br>" ?> </p>

        <div class="form-group">
            <label for="changeFullName">Change Full Name:</label>
            <input required class="form-control" type="text" name="changeFullName" placeholder="John Smith">
        </div>

        <div class="password">
            <label for="newPassword">New Password:</label>
            <input required class="form-control" type="password" name="newPassword" placeholder="More than 6 symbols">
        </div>

        <div class="form-group">
            <label for="confirmNewPassword">Confirm New Password:</label>
            <input required class="form-control" type="password" name="confirmNewPassword" placeholder="Confirm password">
        </div>

        <button class="btn btn-success" type="submit" name="submit"><span>Edit</span></button>
    </form>
</center>
<br>
</body>
</html>