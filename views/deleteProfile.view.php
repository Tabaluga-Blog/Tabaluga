<?php
use Models\User;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Profile</title>
    <style>
        .form-group input[type="checkbox"] {
            display: none;
        }

        .form-group input[type="checkbox"] + .btn-group > label span {
            width: 20px;
        }

        .form-group input[type="checkbox"] + .btn-group > label span:first-child {
            display: none;
        }
        .form-group input[type="checkbox"] + .btn-group > label span:last-child {
            display: inline-block;
        }

        .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
            display: inline-block;
        }
        .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
            display: none;
        }
        h2 {
            color: red;
        }
    </style>
</head>
<body>
<div style="text-align: center;">
    <h2>Before deleting your account, please confirm your email and password</h2>
    <form class="large" action='deleteProfile.php' method="POST">
        <p style="color:red">
            <?php echo $message . "<br>" ?>
        </p>

        <div class="form-group">
            <label for="email">Email: </label>
            <input autocomplete="off" required class="form-control" type="email" name="email" placeholder="Email">

            <label for="newPassword">New Password:</label>
            <input autocomplete="off" required class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="[ form-group ]">
            <input type="checkbox" name="fancy-checkbox-danger" id="fancy-checkbox-danger" autocomplete="off" required />
            <div class="[ btn-group ]">
                <label for="fancy-checkbox-danger" class="[ btn btn-danger ]">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="fancy-checkbox-danger" class="[ btn btn-default active ]">
                    I Want To Delete My Profile
                </label>
            </div>
        </div>

        <button class="btn btn-danger" type="submit" name="delete"><span>Delete</span></button>
    </form>
    <br>
</div>
</body>
</html>