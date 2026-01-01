<?php include "PHP/register_logic.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register | NG Auto</title>
    <link rel="stylesheet" href="css/register.css">
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

        <h3>Create Account</h3>

        <form method="post" action="">

            <div class="field">
                <label>Full Name:</label>
                <input type="text" name="fullname" placeholder="Enter full name (2+ chars, only letters allowed)">
            </div>
           <?php
            if (!empty($nameErrors)) {
                echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
                foreach ($nameErrors as $e) echo "<li>Name: $e</li>";
                echo "</ul>";
            }
            ?>

            <div class="field">
                <label>Email:</label>
                <input type="text" name="email" placeholder="Enter email">
            </div>
            <?php
            if (!empty($emailErrors)) {
                echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
                foreach ($emailErrors as $e) echo "<li>Email: $e</li>";
                echo "</ul>";
            }
            ?>

            <div class="field">
                <label>Password:</label>
                <input type="password" name="password"
                       placeholder="Use 7+ characters with uppercase, number & symbol.">
            </div>

            <div class="field">
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password"
                       placeholder="Re-enter password">
            </div>

        
            <?php
            if (!empty($passwordErrors)) {
                echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
                foreach ($passwordErrors as $e) echo "<li>Password: $e</li>";
                echo "</ul>";
            }
            ?>

            <button id="btn_sign" type="submit">Register</button>

        </form>

        <p class="register">
            Already have an account?
            <a href="login.php">Sign in</a>
        </p>

    </div>
</section>

</body>
</html>
