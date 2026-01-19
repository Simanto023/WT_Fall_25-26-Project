<?php
session_start();
include "../Controller/login_logic.php";
include __DIR__ . "/../../DB/db.php";


if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_user'])) {

    $uid = $_COOKIE['remember_user'];

    $result = $conn->query("SELECT * FROM users WHERE id = $uid");

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['full_name'] = $user['full_name'];

        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: customer_dashboard.php");
        }
        exit;
    }
}
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
        <img src="../../images/logo.png" id="header-logo">
        <h2>NG Auto</h2>
    </div>
</header>

<section>
    <div id="box">

        <h3>Sign In</h3>

        <form method="post" action="">

            <div class="field">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Enter email">
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
                <input type="password" name="password" placeholder="Enter password">
            </div>

              <?php
           if (!empty($passwordErrors)) {
                echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
                foreach ($passwordErrors as $e) echo "<li>Password: $e</li>";
                echo "</ul>";
            }
            ?>
             <?php
           if (!empty($loginErrors)) {
                echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
                foreach ($loginErrors as $e) echo "<li>Error: $e</li>";
                echo "</ul>";
            }
            ?>

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