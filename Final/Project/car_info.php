<?php
include __DIR__ . "/DB/db.php";

$car = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT * FROM cars WHERE id = $id");

    if ($result && $result->num_rows == 1) {
        $car = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Details</title>
    <link rel="stylesheet" href="CSS/car_info.css">
</head>
<body>

<a href="dashboard.php">
    <img src="images/logo.png" id="logo">
</a>

<a href="user.php">
    <img src="images/user1.png" id="usericon"
         style="width: 60px;
    height: 60px;
    position: absolute;
    top: 10px;
    right: 70px;">
</a>


<a href="catalogue.php" style="margin:20px; display:inline-block; color: orange;">← Back to Catalogue</a>

<?php if ($car): ?>

<div id="car_container">

    <div id="car_image">
        <img src="images/cars/<?php echo $car['image']; ?>">
    </div>

    <div id="car_details">
        <h1><?php echo $car['brand'] . " " . $car['model']; ?></h1>

        <p class="price">Price: ৳ <?php echo $car['price']; ?></p>

        <table>
            <tr>
                <td>Brand</td>
                <td><?php echo $car['brand']; ?></td>
            </tr>
            <tr>
                <td>Model</td>
                <td><?php echo $car['model']; ?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?php echo $car['category']; ?></td>
            </tr>
            <tr>
                <td>Color</td>
                <td><?php echo $car['color']; ?></td>
            </tr>
            <tr>
                <td>Horsepower</td>
                <td><?php echo $car['horsepower']; ?> HP</td>
            </tr>
            <tr>
                <td>Engine Capacity</td>
                <td><?php echo $car['engine_capacity']; ?></td>
            </tr>
            <tr>
                <td>Transmission</td>
                <td><?php echo $car['transmission']; ?></td>
            </tr>
        </table>

        <div class="buttons">
            <button>Add to Cart</button>
            <button>Compare</button>
        </div>
    </div>

</div>

<?php else: ?>

<h2 style="text-align:center; margin-top:100px;">Car not found.</h2>

<?php endif; ?>


<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
