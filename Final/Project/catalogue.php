<?php
include __DIR__ . "/DB/db.php";

/* FETCH FAMILY CARS */
$familyCars = [];
$familyResult = $conn->query("SELECT * FROM cars WHERE category='Family'");
if ($familyResult && $familyResult->num_rows > 0) {
    while ($row = $familyResult->fetch_assoc()) {
        $familyCars[] = $row;
    }
}

/* FETCH SPORTS CARS */
$sportsCars = [];
$sportsResult = $conn->query("SELECT * FROM cars WHERE category='Sports'");
if ($sportsResult && $sportsResult->num_rows > 0) {
    while ($row = $sportsResult->fetch_assoc()) {
        $sportsCars[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <link rel="stylesheet" href="CSS/catalogue.css">
    <script src="JS/catalogue.js" defer></script>
</head>

<body>

<a href="dashboard.php">
    <img src="images/logo.png" id="logo">
</a>

<h1>Catalogue</h1>

<div id="selector">
    <a href="#" id="familyBtn">Family Cars</a> | 
    <a href="#" id="sportsBtn">Sports Cars</a>
</div>

<a href="user1.html">
    <img src="images/user1.png" id="usericon"
         style="width:60px; height:60px; position:absolute; top:10px; right:70px;">
</a>

<!-- FAMILY CARS -->
<div id="family">
<?php
if (!empty($familyCars)) {
    foreach ($familyCars as $car) {
        echo "
        <a href='car_info.php?id={$car['id']}' style='text-decoration:none; color:inherit;'>
            <div class='family-box'>
                <img src='images/cars/{$car['image']}'>
                <h3>{$car['brand']} {$car['model']}</h3>
                <p>Price: {$car['price']}</p>
                <p>{$car['horsepower']} HP • {$car['engine_capacity']} • {$car['transmission']}</p>
            </div>
        </a>
        ";
    }
}
?>
</div>

<!-- SPORTS CARS -->
<div id="sports" style="display:none;">
<?php
if (!empty($sportsCars)) {
    foreach ($sportsCars as $car) {
        echo "
        <a href='car_info.php?id={$car['id']}' style='text-decoration:none; color:inherit;'>
            <div class='sports-box'>
                <img src='images/cars/{$car['image']}'>
                <h2>{$car['brand']} {$car['model']}</h2>
                <p>Price: {$car['price']}</p>
                <p>{$car['horsepower']} HP • {$car['engine_capacity']} • {$car['transmission']}</p>
            </div>
        </a>
        ";
    }
}
?>
</div>

<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
