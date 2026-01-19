<?php
ini_set('session.cookie_path', '/');
session_start();
include __DIR__ . "/../../DB/db.php";

$not_logged_in = false;

if (!isset($_SESSION['user_id'])) {
    $not_logged_in = true;
} else {
    $user_id = $_SESSION['user_id'];

    $sql = "
        SELECT * FROM orders 
        WHERE status = 'shipped' AND user_id = $user_id
        ORDER BY created_at DESC
    ";

    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <link rel="stylesheet" href="../View/css/orderhistory.css">
</head>
<body>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>

<h1>Order History</h1>

<div id="orders">

<?php if ($not_logged_in): ?>

    <p style="color:white; text-align:center; font-size:20px; margin-top:50px;">
        Please login first to view your order history.
    </p>

<?php else: ?>

    <?php if ($result && $result->num_rows > 0): ?>

        <?php while ($row = $result->fetch_assoc()): ?>

            <div class="order_card">
                <h3><?php echo htmlspecialchars($row['car_name']); ?></h3>
                <p>Order ID: #<?php echo $row['id']; ?></p>
                <p>Date: <?php echo date("d M Y", strtotime($row['created_at'])); ?></p>
                <p>Price: ৳ <?php echo number_format($row['total_amount']); ?></p>
                <p>Status: <?php echo ucfirst($row['status']); ?></p>
            </div>

        <?php endwhile; ?>

    <?php else: ?>

        <p style="color:white; text-align:center; font-size:18px; margin-top:50px;">
            No shipped orders found.
        </p>

    <?php endif; ?>

<?php endif; ?>

</div>

<a href="user.php">
    <img src="../../images/user1.png" id="usericon"
         style="width:60px;height:60px;position:absolute;top:10px;right:70px;">
</a>

<div id="footer" style="text-align:center;color:white;margin-top:100px;padding:20px;font-size:14px;opacity:0.7;">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
