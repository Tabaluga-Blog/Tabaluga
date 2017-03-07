<?php
use Models\User;
?>
<center>
    <h3>Here you can change your profile details...</h3>
    <form class="large" action='editProfile.php' method="POST">
        <p style="color:red">
            <?php echo $message . "<br>" ?>
        </p>

        <div class="form-group">
            <label for="email">Email: </label>
            <input autocomplete="off" required class="form-control" type="email" name="email" placeholder="You cannot change your email address" disabled>

            <label for="changeFullName">Change Full Name:</label>
            <input autocomplete="off" required class="form-control" type="text" name="changeFullName" placeholder="John Smith">

            <label for="newPassword">New Password:</label>
            <input autocomplete="off" required class="form-control" type="password" name="newPassword" placeholder="More than 6 symbols">

            <label for="confirmNewPassword">Confirm New Password:</label>
            <input autocomplete="off" required class="form-control" type="password" name="confirmNewPassword" placeholder="Confirm password">
        </div>

        <button class="btn btn-success" type="submit" name="submit"><span>Edit</span></button>
    </form>
</center>
<br>
</body>
</html>