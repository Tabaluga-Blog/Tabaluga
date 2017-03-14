<style media="screen">
    body {padding: 100px 10px 0px 10px; min-height: auto}
</style>

<h3 class="text-center"><?= $message ?></h3>
<form class="large" action='register.php' method="POST">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="text-center bigText">Register</p>
        
            <div class="form-group">
                <label for="email" class="fill text-center">Email:</label>
                <input required class="form-control text-center" type="email" name="email" placeholder="JohnSmith@example.com">
            </div>
        
            <div class="form-group">
                <label for="fullName" class="fill text-center">Full Name:</label>
                <input required class="form-control text-center" type="text" name="fullName" placeholder="John Smith">
            </div>
        
            <div class="form-group">
                <label for="password" class="fill text-center">Password:</label>
                <input required class="form-control text-center" type="password" name="password" placeholder="More than 6 symbols">
            </div>
        
            <div class="form-group">
                <label for="confirmPassword" class="fill text-center">Confirm Password:</label>
                <input required class="form-control text-center" type="password" name="confirmPassword" placeholder="Confirm password">
            </div>
        
            <button class="btn btn-success fill" type="submit" name="submit"><span>Submit</span></button>
            
            <a href="login.php" class="mediumText text-center fill"><h4>Already registered? Click here.</h4></a>
        </div>
    </div>
</form>