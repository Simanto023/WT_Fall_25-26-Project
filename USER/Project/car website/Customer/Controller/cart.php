<?php
ini_set('session.cookie_path', '/');
session_start();
include __DIR__ . "/../../DB/db.php";

$not_logged_in = false;

if (!isset($_SESSION['user_id'])) {
    $not_logged_in = true;
} else {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_item'])) {
        $remove_id = intval($_POST['car_id']);
        $conn->query("DELETE FROM cart_items WHERE user_id = $user_id AND car_id = $remove_id");
    }

    $sql = "
    SELECT cart_items.car_id, cart_items.quantity, cars.brand, cars.model, cars.price, cars.image
    FROM cart_items
    JOIN cars ON cart_items.car_id = cars.id
    WHERE cart_items.user_id = $user_id
    ";

    $result = $conn->query($sql);
    $total = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../View/css/cart.css">
</head>
<body>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>

<center><h2>Your Cart</h2></center>

<div id="cart">

<?php if ($not_logged_in): ?>

    <p style="text-align:center; font-size:20px; color:red; margin-top:50px;">
        Please login first to view your cart.
    </p>

<?php else: ?>

    <?php if ($result->num_rows > 0): ?>

        <?php while ($row = $result->fetch_assoc()):
            $subtotal = $row['price'] * $row['quantity'];
            $total += $subtotal;
        ?>

        <div class="cart-box">
            <img src="../../images/cars/<?php echo $row['image']; ?>">
            <h3><?php echo $row['brand'] . " " . $row['model']; ?></h3>
            <p>Price: ৳ <?php echo $row['price']; ?></p>
            <p>Quantity: <?php echo $row['quantity']; ?></p>
            <p><strong>Subtotal:</strong> ৳ <?php echo $subtotal; ?></p>

            <form method="post">
                <input type="hidden" name="car_id" value="<?php echo $row['car_id']; ?>">
                <button type="submit" name="remove_item"
                    style="background:red;color:white;padding:8px 15px;border:none;border-radius:5px;cursor:pointer;">
                    Remove
                </button>
            </form>
        </div>

        <?php endwhile; ?>

    <?php else: ?>
        <p style="text-align:center; margin-top:50px; font-size:18px;">
            Your cart is empty.
        </p>
    <?php endif; ?>

<?php endif; ?>

</div>

<hr>

<center>
<?php if (!$not_logged_in): ?>
    <p><strong>Total:</strong> ৳ <?php echo $total; ?></p>

    <?php if ($total > 0): ?>
        <a href="checkout.php">
            <button id="checkout_btn">Proceed to Checkout</button>
        </a>
    <?php endif; ?>
<?php endif; ?>
</center>

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
