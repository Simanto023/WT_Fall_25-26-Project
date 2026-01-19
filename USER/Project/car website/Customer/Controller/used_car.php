<?php
include __DIR__ . "/../../DB/db.php";



$car = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT * FROM marketplace_listings WHERE id = $id AND status = 'approved'");

    if ($result && $result->num_rows == 1) {
        $car = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Used Car Details</title>
    <link rel="stylesheet" href="../View/css/used_car.css">
    <script src="../View/js/used_car.js" defer></script>
</head>
<body>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>


<a href="user.php">
    <img src="../../images/user1.png" id="usericon"
         style="width: 60px;
    height: 60px;
    position: absolute;
    top: 10px;
    right: 70px;">
</a>


<a href="marketplace.php" class="back_link">← Back to Marketplace</a>

<?php if ($car): ?>

<div id="car_container">

    <div id="car_image">
        <img src="../../images/marketplace/<?php echo $car['image']; ?>">
    </div>

    <div id="car_details">
        <h1><?php echo $car['car_name']; ?></h1>

        <p class="price">Price: ৳ <?php echo $car['price']; ?></p>

        <table>
            <tr>
                <td>Brand</td>
                <td><?php echo $car['brand']; ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><?php echo $car['location']; ?></td>
            </tr>
            <tr>
                <td>Condition</td>
                <td><?php echo $car['cond']; ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $car['description']; ?></td>
            </tr>
        </table>

        <div class="phone_box">
            <button id="show_phone_btn">Show Phone Number</button>
            <p id="phone_number" style="display:none;"><?php echo $car['phone_number']; ?></p>
        </div>

    </div>

</div>

<?php else: ?>

<h2 class="not_found">Listing not found.</h2>

<?php endif; ?>

<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
