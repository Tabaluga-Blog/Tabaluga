<div class="editContainer">
    <form class="medium" action="../User/editProfile.php" method="POST">
        <h2 class="fill text-center">Change Name</h2>
        <hr>
        <?php 
        if (isset($changeNameError)) 
        echo "<h4 class=\"fill text-center\">{$changeNameError}</h4>";
        ?>
        
        <div class="form-group">
            <label for="newName" class="fill text-center">New Name:</label>
            <input class="form-control text-center" type="text" name="newName" placeholder="Jack Smith">
        </div>
        <button class="btn btn-success" type="submit" name="changeName"><span>Change Name</span></button>
    </form>
    <hr>
    <form autocomplete="off" class="medium" action='../User/editProfile.php' method="POST">
        <h2 class="fill text-center">Change Password</h2>
        <hr>
        
        <div class="form-group">
            <?php 
            if (isset($changePasswordError))
            echo "<h2 class=\"fill text-center\">{$changePasswordError}</h2>";
            ?>
            <label for="oldPassword" class="text-center fill">Old Password:</label>
            <input class="form-control text-center" type="password" name="oldPassword" placeholder="Old Password">
            
            <label for="newPassword" class="text-center fill">New Password:</label>
            <input class="form-control text-center" type="password" name="newPassword" placeholder="At least 5 symbols">
            
            <label for="confirmNewPassword" class="text-center fill">Confirm New Password:</label>
            <input class="form-control text-center" type="password" name="confirmNewPassword" placeholder="Confirm password">
        </div>
        
        <button class="btn btn-success" type="submit" name="changePassword"><span>Change Password</span></button>
    </form>
</div>
    
