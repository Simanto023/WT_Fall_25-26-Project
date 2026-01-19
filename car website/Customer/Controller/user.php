<?php
ini_set('session.cookie_path', '/');
session_start();
include __DIR__ . "/../../DB/db.php";

if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red;text-align:center;'>Please login first.</p>";
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

/* Fetch user info */
$user = null;
$result = $conn->query("SELECT * FROM users WHERE id = $user_id");
if ($result && $result->num_rows == 1) {
    $user = $result->fetch_assoc();
}

/* Logout */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {

    $_SESSION = [];

    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    session_destroy();
    header("Location: ../../Admin/View/login.php");
    exit();
}

/* Update Name */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_name'])) {
    $new_name = trim($_POST['full_name']);

    if (!empty($new_name)) {
        $conn->query("UPDATE users SET full_name = '$new_name' WHERE id = $user_id");
        $_SESSION['full_name'] = $new_name;
        $message = "Name updated successfully.";
    }
}

/* Update Email */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_email'])) {
    $new_email = trim($_POST['email']);

    if (!empty($new_email)) {
        $conn->query("UPDATE users SET email = '$new_email' WHERE id = $user_id");
        $message = "Email updated successfully.";
    }
}

/* Change Password */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    $current = $_POST['current_password'];
    $new     = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if (!empty($current) && !empty($new) && !empty($confirm)) {

        if ($new !== $confirm) {
            $message = "New passwords do not match.";
        } else {
            if (password_verify($current, $user['password'])) {
                $hashed = password_hash($new, PASSWORD_DEFAULT);
                $conn->query("UPDATE users SET password = '$hashed' WHERE id = $user_id");
                $message = "Password updated successfully.";
            } else {
                $message = "Current password is incorrect.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="../View/css/user.css">
</head>
<body>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>

<h1>My Account</h1>

<?php if (!empty($message)): ?>
    <p style="text-align:center;color:lime;"><?php echo $message; ?></p>
<?php endif; ?>

<div id="profile_container">

    <div class="profile_box">
        <h2>Account Info</h2>

        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Role:</strong> <?php echo ucfirst($user['role']); ?></p>

        <form method="post" style="margin-top:20px;">
            <button type="submit" name="logout"
                style="background:red;color:white;padding:10px 20px;border:none;border-radius:5px;cursor:pointer;">
                Logout
            </button>
        </form>
    </div>

    <div class="profile_box">
        <h2>Update Name</h2>
        <form method="post">
            <label>New Full Name</label>
            <input type="text" name="full_name" required>
            <button type="submit" name="update_name">Update Name</button>
        </form>
    </div>

    <div class="profile_box">
        <h2>Update Email</h2>
        <form method="post">
            <label>New Email</label>
            <input type="email" name="email" required>
            <button type="submit" name="update_email">Update Email</button>
        </form>
    </div>

    <div class="profile_box">
        <h2>Change Password</h2>
        <form method="post">
            <label>Current Password</label>
            <input type="password" name="current_password" required>

            <label>New Password</label>
            <input type="password" name="new_password" required>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required>

            <button type="submit" name="update_password">Update Password</button>
        </form>
    </div>

</div>

<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
