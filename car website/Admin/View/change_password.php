<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Set Password | NG Auto</title>
    <link rel="stylesheet" href="css/change_password.css">
</head>

<body>

<section>
    <div id="box">

        <h2>Set Password</h2>

        <div class="icon">
            <img src="images/change_password.png" alt="Change Password">
        </div>

        <form>

            <div class="field">
                <label>New password</label>
                <input type="password" name="new_password" placeholder="Enter new password">
                <small>(minimum 6 characters in length)</small>
            </div>

            <div class="field">
                <label>Confirm new password</label>
                <input type="password" name="confirm_password" placeholder="Confirm new password">
                <small>(minimum 6 characters in length)</small>
            </div>

            <button id="btn_sign" type="button">Change Password</button>

        </form>

        <div class="back">
            <a href="login.html">Go back to Login</a>
        </div>

    </div>
</section>

</body>
</html>
