<?php
include __DIR__ . "/../../DB/db.php";




$cars = [];
$result = $conn->query("SELECT * FROM cars");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

$car1 = null;
$car2 = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id1 = $_POST["car1"] ?? "";
    $id2 = $_POST["car2"] ?? "";

    if ($id1 && $id2) {
        $r1 = $conn->query("SELECT * FROM cars WHERE id = $id1");
        $r2 = $conn->query("SELECT * FROM cars WHERE id = $id2");

        if ($r1 && $r1->num_rows == 1){
            $car1 = $r1->fetch_assoc();
        }
        if ($r2 && $r2->num_rows == 1){
            $car2 = $r2->fetch_assoc();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compare</title>
    <link rel="stylesheet" href="../View/css/compare.css">
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

<h1>Compare Cars</h1>
<p>Pick two cars to compare</p>

<form action="" method="post" id="selectors">

    <select name="car1">
        <option value="">Select Car 1</option>
        <?php foreach ($cars as $car): ?>
            <option value="<?php echo $car['id']; ?>">
                <?php echo $car['brand']." ".$car['model']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="car2">
        <option value="">Select Car 2</option>
        <?php foreach ($cars as $car): ?>
            <option value="<?php echo $car['id']; ?>">
                <?php echo $car['brand']." ".$car['model']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <button type="submit">Compare</button>

</form>

<?php if ($car1 && $car2): ?>
<div id="comparison-box">

<table>
    <tr>
        <th>Featured Cars</th>
        <th><?php echo $car1['brand']." ".$car1['model']; ?></th>
        <th><?php echo $car2['brand']." ".$car2['model']; ?></th>
    </tr>

    <tr>
        <td>Image</td>
        <td><img src="../../images/cars/<?php echo $car1['image']; ?>" width="250"></td>
        <td><img src="../../images/cars/<?php echo $car2['image']; ?>" width="250"></td>
    </tr>

    <tr>
        <td>Name</td>
        <td><?php echo $car1['brand']." ".$car1['model']; ?></td>
        <td><?php echo $car2['brand']." ".$car2['model']; ?></td>
    </tr>

    <tr>
        <td>Color</td>
        <td><?php echo $car1['color']; ?></td>
        <td><?php echo $car2['color']; ?></td>
    </tr>

    <tr>
        <td>Price</td>
        <td><?php echo $car1['price']; ?></td>
        <td><?php echo $car2['price']; ?></td>
    </tr>

    <tr>
        <td>Horsepower</td>
        <td><?php echo $car1['horsepower']; ?> HP</td>
        <td><?php echo $car2['horsepower']; ?> HP</td>
    </tr>

    <tr>
        <td>Engine Capacity</td>
        <td><?php echo $car1['engine_capacity']; ?></td>
        <td><?php echo $car2['engine_capacity']; ?></td>
    </tr>

    <tr>
        <td>Transmission</td>
        <td><?php echo $car1['transmission']; ?></td>
        <td><?php echo $car2['transmission']; ?></td>
    </tr>

    <tr>
        <td>Category</td>
        <td><?php echo $car1['category']; ?></td>
        <td><?php echo $car2['category']; ?></td>
    </tr>
</table>

</div>
<?php endif; ?>

<div id="footer">
    <p>© 2025 NG Auto. All rights reserved.</p>
    <p>Contact: support@ngauto.com | +880-111-222-333</p>
</div>

</body>
</html>
