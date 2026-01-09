<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="CSS/user.css">
</head>
<body>


<a href="dashboard.php">
    <img src="images/logo.png" id="logo">
</a>

<h1>My Account</h1>

<div id="profile_container">


    <div class="profile_box">
        <h2>Account Info</h2>

        <p><strong>Full Name:</strong> Saidur Rahman</p>
        <p><strong>Email:</strong> saidur@gmail.com</p>
        <p><strong>Role:</strong> Customer</p>
    </div>


    <div class="profile_box">
        <h2>Update Name</h2>

        <form>
            <label>New Full Name</label>
            <input type="text" placeholder="Enter new name">

            <button type="submit">Update Name</button>
        </form>
    </div>


    <div class="profile_box">
        <h2>Update Email</h2>

        <form>
            <label>New Email</label>
            <input type="email" placeholder="Enter new email">

            <button type="submit">Update Email</button>
        </form>
    </div>


    <div class="profile_box">
        <h2>Change Password</h2>

        <form>
            <label>Current Password</label>
            <input type="password" placeholder="Current password">

            <label>New Password</label>
            <input type="password" placeholder="New password">

            <label>Confirm Password</label>
            <input type="password" placeholder="Confirm password">

            <button type="submit">Update Password</button>
        </form>
    </div>

</div>


<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
