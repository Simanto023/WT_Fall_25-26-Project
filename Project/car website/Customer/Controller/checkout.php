<?php
ini_set('session.cookie_path', '/');
session_start();
include __DIR__ . "/../../DB/db.php";

$address = "";
$phonenumber = "";
$error = "";
$success = false;
$not_logged_in = false;
$cart_empty = false;

if (!isset($_SESSION['user_id'])) {
    $not_logged_in = true;
} else {
    $user_id = $_SESSION['user_id'];

    $cart_result = $conn->query("
        SELECT cart_items.car_id, cart_items.quantity, cars.brand, cars.model, cars.price
        FROM cart_items
        JOIN cars ON cart_items.car_id = cars.id
        WHERE cart_items.user_id = $user_id
    ");

    if ($cart_result->num_rows == 0) {
        $cart_empty = true;
    }

    if (isset($_POST["submit"]) && !$cart_empty) {

        if (empty($_POST["address"])) {
            $error .= "Address is required.<br>";
        } else {
            $address = trim($_POST["address"]);
        }

        if (empty($_POST["phonenumber"])) {
            $error .= "Phone number is required.<br>";
        } else {
            $phonenumber = trim($_POST["phonenumber"]);

            if (!is_numeric($phonenumber)) {
                $error .= "Phone number must be numeric.<br>";
            } else if (strlen($phonenumber) != 11) {
                $error .= "Phone number must be 11 digits.<br>";
            } else if (substr($phonenumber, 0, 2) != "01") {
                $error .= "Phone number must start with 01.<br>";
            }
        }

        if ($error == "") {

            $total = 0;
            $car_names = [];

            while ($row = $cart_result->fetch_assoc()) {
                $subtotal = $row['price'] * $row['quantity'];
                $total += $subtotal;
                $car_names[] = $row['brand'] . " " . $row['model'];
            }

            $car_list = implode(", ", $car_names);

            $conn->query("
                INSERT INTO orders (user_id, car_name, address, phone_number, total_amount, status)
                VALUES ($user_id, '$car_list', '$address', '$phonenumber', $total, 'pending')
            ");

            $conn->query("DELETE FROM cart_items WHERE user_id = $user_id");

            $success = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="../View/css/checkout.css">
</head>
<body>

<center><h1>Checkout</h1></center>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>

<?php if ($not_logged_in): ?>

    <p style="color:red;text-align:center;font-size:20px;margin-top:50px;">
        Please login first to checkout.
    </p>

<?php elseif ($cart_empty): ?>

    <p style="color:red;text-align:center;font-size:20px;margin-top:50px;">
        Your cart is empty.
    </p>

<?php elseif ($success): ?>

    <p style="color:green;text-align:center;font-size:22px;margin-top:50px;">
        Order placed successfully!
    </p>

<?php else: ?>

<form method="post" action="" style="width:400px;margin:50px auto;">

    <label>Address:</label><br>
    <textarea name="address" rows="4" cols="40"><?php echo $address; ?></textarea>
    <br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>">
    <br><br>

    <input type="submit" name="submit" value="Confirm Order">

</form>

<?php if ($error != ""): ?>
    <p style="color:red; text-align:center;"><?php echo $error; ?></p>
<?php endif; ?>

<?php endif; ?>

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
