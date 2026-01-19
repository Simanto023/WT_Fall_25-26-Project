<?php
include __DIR__ . "/../../DB/db.php";

$categories = [];
$result = $conn->query("SELECT name FROM categories WHERE status = 'active'");

while ($row = $result->fetch_assoc()) {
    $categories[] = $row['name'];
}

$selectedCategory = "";

if (isset($_GET['category'])) {
    $selectedCategory = $_GET['category'];
} else if (!empty($categories)) {
    $selectedCategory = $categories[0];
}

$cars = [];
if (!empty($selectedCategory)) {
    $stmt = $conn->prepare("SELECT * FROM cars WHERE category = ?");
    $stmt->bind_param("s", $selectedCategory);
    $stmt->execute();
    $carResult = $stmt->get_result();

    while ($row = $carResult->fetch_assoc()) {
        $cars[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <link rel="stylesheet" href="../View/css/catalogue.css">
</head>

<body>

<a href="dashboard.php">
    <img src="../../images/logo.png" id="logo">
</a>

<h1>Catalogue</h1>

<form method="get" style="text-align:center; margin-bottom:30px;">
    <select name="category" onchange="this.form.submit()" style="padding:10px; font-size:16px;">
        <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat; ?>" <?php if ($cat == $selectedCategory) echo "selected"; ?>>
                <?php echo $cat; ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<a href="user.php">
    <img src="../../images/user1.png" id="usericon"
         style="width:60px;height:60px;position:absolute;top:10px;right:70px;">
</a>

<div id="catalogue">

<?php if (!empty($cars)): ?>
    <?php foreach ($cars as $car): ?>
        <a href="car_info.php?id=<?php echo $car['id']; ?>" style="text-decoration:none; color:inherit;">
            <div class="sports-box">
                <img src="../../images/cars/<?php echo $car['image']; ?>">
                <h2><?php echo $car['brand'] . " " . $car['model']; ?></h2>
                <p>Price: <?php echo number_format($car['price']); ?></p>
                <p><?php echo $car['horsepower']; ?> HP • <?php echo $car['engine_capacity']; ?> • <?php echo $car['transmission']; ?></p>
            </div>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <p style="color:white; text-align:center;">No cars found in this category.</p>
<?php endif; ?>

</div>

<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
