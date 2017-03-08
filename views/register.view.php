<style media="screen">
    body {padding: 100px 10px 0px 10px; min-height: auto}
</style>

<a class="btn btn-success btn-lg" href="login.php" role="button">Login</a>

<h2>Register</h2>

<form class="large" action='register.php' method="POST">
    <p style="color:red"> <?php echo $message . "<br>" ?> </p>

    <div class="form-group">
        <label for="email">Email:</label>
        <input required class="form-control" type="email" name="email" placeholder="JohnSmith@example.com">
    </div>

    <div class="form-group">
        <label for="fullName">Full Name:</label>
        <input required class="form-control" type="text" name="fullName" placeholder="John Smith">
    </div>

    <div class="password">
        <label for="password">Password:</label>
        <input required class="form-control" type="password" name="password" placeholder="More than 6 symbols">
    </div>

    <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input required class="form-control" type="password" name="confirmPassword" placeholder="Confirm password">
    </div>

    <button class="btn btn-success" type="submit" name="submit"><span>Submit</span></button>
</form>