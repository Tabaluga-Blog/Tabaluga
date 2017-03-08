<style media="screen">
    body {padding: 100px 10px 0px 10px; min-height: auto}
</style>

<a class="btn btn-success btn-lg" href="register.php" role="button">Register</a>

<h2>Login</h2>

<form class="medium" action="login.php" method="post">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input required class="input form-control" type="email" name="email" placeholder="johnSmith@example.com">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input required class="input form-control" type="password" name="password">
            </div>
            <button type="submit" class="btn btn-success fill"><span>Log In</span></button>
        </div>
    </div>
</form>
