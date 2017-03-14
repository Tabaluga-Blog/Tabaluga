<style media="screen">
    body {padding: 100px 10px 0px 10px; min-height: auto}
</style>
<h3 class="text-center"><?= $message ?></h3>
<form class="medium" action="login.php" method="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="text-center bigText">Login</p>
            <div class="form-group">
                <label for="email" class="text-center fill">Email address:</label>
                <input required class="input form-control text-center" type="email" name="email" placeholder="johnSmith@example.com">
            </div>
            <div class="form-group">
                <label for="password" class="text-center fill">Password:</label>
                <input required class="input form-control text-center" type="password" name="password">
            </div>
            <button type="submit" class="btn btn-success fill"><span>Log In</span></button>
            <a href="register.php" class="mediumText text-center fill"><h4>Don't have an account? Click here.</h4></a>
        </div>
    </div>
</form>