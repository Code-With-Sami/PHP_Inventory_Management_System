<?php
include("../user/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - php inventory management system</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form name="loginForm" method="post" class="form-vertical">
        <div class="control-group normal_text"><h3>Admin Login Page</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password"/ required>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="submit" value="login" class="btn btn-success">
            <span class="pull-right"><a href="#" class="flip-link btn btn-info" id="to-recover">Create Account?</a></span>

        </div>
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $count = 0;
        $result = mysqli_query($link,"select * from user_registration where username = '$username' && password = '$password' && role = 'admin' && status = 'active' ");
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $_SESSION["admin"]=$username;
    ?>
        <script>
            window.location = "dashboard.php";
        </script>
    <?php
        }
        else{
    ?> 
        <div class="alert alert-danger">
            Invalid username or password...
        </div>
    <?php
        }
    }
    ?>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
