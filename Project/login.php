<?php
include "PHP/login_logic.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <title>Login | NG Auto</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

<header>
    <div id="header">
        <img src="images/logo.png" id="header-logo">
        <h2>NG Auto</h2>
    </div>
</header>

<section>
    <div id="box">

        <h3>Sign In</h3>
     <form method="post" action="">
        <div class="field">
            <label>Email:</label>
            <input type="email" name= "email" placeholder="Enter email">
        </div>

        <div class="field">
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter password">
        </div>

        <div id="options">
            <label class="remember">
                <input type="checkbox" name="remember"> Remember me
            </label>

            <a href="reset_password.html">Recover Password</a>
        </div>

        <button id="btn_sign" type="submit">Sign In</button>

        <p class="register">
            Don’t have an account?
            <a href="register.php">Register here</a>
        </p>
</form>
    </div>
</section>

<footer>
    Contact us:
    <a href="mailto:support@ngauto.com">click here</a>
</footer>

</body>
</html>
