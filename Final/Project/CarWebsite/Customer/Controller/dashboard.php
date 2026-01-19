<?php
session_start();
include __DIR__ . "/../../DB/db.php";

$announcement = null;

$sql = "SELECT * FROM announcements 
        WHERE expires_at > NOW() 
        ORDER BY created_at DESC 
        LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $announcement = $result->fetch_assoc();
}

$full_name = "";
if (isset($_SESSION['full_name'])) {
    $full_name = $_SESSION['full_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../View/css/dashboard.css">
</head>
<body>

<img src="../../images/bg2.png" alt="" id="bg">

<div id="p1">

    <a href="dashboard.php">
        <img src="../../images/logo.png" alt="logo" id="logo">
    </a>

    <a href="catalogue.php">Catalogue</a>
    <a href="compare.php">Compare Cars</a>
    <a href="marketplace.php">Marketplace</a>
    <a href="orderhistory.php">Order History</a>
    <a href="cart.php">Cart</a>

</div>


<div id="main_wrapper">

    <?php if (!empty($full_name)): ?>
        <h2 style="color:white; margin-bottom:20px;">Welcome, <?php echo htmlspecialchars($full_name); ?></h2>
    <?php else: ?>
        <h2 style="color:white; margin-bottom:20px;">Welcome to NG Auto</h2>
    <?php endif; ?>

    <?php if ($announcement): ?>
    <div id="announcement_panel">
        <h2><?php echo $announcement['title']; ?></h2>
        <div class="announcement_box">
            <?php echo nl2br($announcement['message']); ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="search-box">
        <h2>Latest cars at NG Auto!</h2>
        <p>Find the best cars available for your needs</p>

        <div class="search-area">
            <input type="text" placeholder="Search here">
            <button>➤</button>
        </div>
    </div>

    <div class="why-section">
        <h2>Why Choose Us</h2>
        <p>We provide the best service and luxury cars at affordable prices.</p>

        <ul>
            <li>✔ Trusted by thousands of customers</li>
            <li>✔ Best price guaranteed</li>
            <li>✔ Fast and safe delivery</li>
        </ul>
    </div>

</div>


<a href="user.php">
    <img src="../../images/user1.png" id="usericon"
         style="width: 60px; height: 60px; position: absolute; top: 10px; right: 70px;">
</a>


<div id="footer" style="
    text-align: center;
    color: white;
    margin-top: 100px;
    padding: 20px;
    font-size: 14px;
    opacity: 0.7;
">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
