<?php

include('connect.php');

$message = "";

if(isset($_POST['submit']))
{
    if($_POST['name']=='' || $_POST['email']=='' || $_POST['password']==''|| $_POST['confirm_password']=='')
    {
        $message = "please fill the empty field.";

    }
    else
    {

        $sql = 'SELECT * FROM users where email = "'.  $_POST['email'] . '"';

        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $message = "Email already used";

        }
        else if ( $_POST['password'] != $_POST['confirm_password']) {
            $message = "Password does not match.";
        }
        else {

            $stmt = $mysqli->prepare("INSERT INTO users (email, name, password, city) VALUES (?, ?, ?, ?) ");

            $stmt->bind_param("ssss", $_POST['email'], $_POST['name'], md5($_POST['password']), $_POST['city']);

           $stmt->execute();



            if($stmt->affected_rows == 1)
            {

                $_SESSION['user_id'] = $mysqli->insert_id;
                $_SESSION['name'] = $_POST['name'];
                header('Location: home_page.php');
            }
            else {
                $message = "Insert post failed.";
            }

        }

    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Register</title>
</head>
<body>
<form id='register' action='register.php' method='post'>
    <fieldset >

        <legend><h1>Register</h1></legend>

        <label for='name'> Your Full Name: </label>
        <input type='text' name='name' id='name' maxlength="50" <?php if (isset($_POST['name'])) {echo 'value =' . "'" . $_POST['name'] . "'";} ?>/>

        <label for='email' >Email Address: </label>
        <input type='email' name='email' id='email' maxlength="50" <?php if (isset($_POST['email'])) {echo 'value =' . "'" . $_POST['email'] . "'";} ?> />

        <label for='password' >Password:</label>
        <input type='password' name='password' id='password' maxlength="50" />

        <label for='confirm_password' >Confirm Password:</label>
        <input type='password' name='confirm_password' id='confirm_password' maxlength="50" />

        <label for='city' > City: </label>
        <input type='text' name='city' id='city' maxlength="50" <?php if (isset($_POST['city'])) {echo 'value =' . "'" . $_POST['city'] . "'";} ?> />

        <input class="button" type='submit' name='submit' value='Submit' />

        <div>
            <?php echo $message; ?>
        </div>

    </fieldset>
</form>
</body>
</html>




<?php


?>
