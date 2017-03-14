<h2 class="text-center">Before deleting your account, please confirm your email and password</h2>
<form class="large" action='deleteProfile.php' method="POST">
    <p>
        <?php echo $message . "<br>" ?>
    </p>

    <div class="form-group">
        <label for="email" class="text-center fill">Email: </label>
        <input autocomplete="off" required class="text-center form-control" type="email" name="email" placeholder="Email">

        <label for="newPassword" class="text-center fill">Password: </label>
        <input autocomplete="off" required class="text-center form-control" type="password" name="password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="checkbox" name="fancy-checkbox-danger" id="fancy-checkbox-danger" autocomplete="off" required />
        <div class="btn-group">
            <label for="fancy-checkbox-danger" class="btn btn-danger">
                <span class="glyphicon glyphicon-ok"></span>
                <span> </span>
            </label>
            <label for="fancy-checkbox-danger" class="btn btn-default active">
                I Want To Delete My Profile
            </label>
        </div>
    </div>
    <button class="btn btn-danger" type="submit" name="delete"><span>Delete</span></button>
</form>
<br>
