<?php
include __DIR__ . "/DB/db.php";

$cars = [];
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}

$carError = "";
$openForm = false;
$editCar = null;

if (isset($_GET["error"])) {
    $carError = "All fields are required";
}

if (isset($_GET["openForm"])) {
    $openForm = true;
}
if (isset($_GET['edit'])) {
    $openForm = true;
    $editId = $_GET['edit'];

    $editResult = $conn->query("SELECT * FROM cars WHERE id = $editId");
    if ($editResult && $editResult->num_rows == 1) {
        $editCar = $editResult->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Cars | NG Auto</title>
    <link rel="stylesheet" href="css/manage_cars.css">
    <script src="js/manage_cars.js" defer></script>
</head>

<body>

<header>
    <div class="topbar">
        <div class="brand">
            <img src="images/logo.png" alt="NG Auto">
            <span>NG AUTO</span>
        </div>
        <a href="admin_dashboard.html" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>

    <div class="page-header">
        <h2>Manage Cars</h2>
        <button type="button" onclick="toggleForm()">+ Add New Car</button>
    </div>

   

    <!-- table-->
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Color</th>
                <th>Engine</th>
                <th>HP</th>
                <th>Transmission</th>
                <th>Price($)</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php
if (!empty($cars)) {
    foreach ($cars as $car) {
        echo "<tr>";
        echo "<td>
        <img src='images/cars/{$car['image']}' class='car-thumb'>
      </td>";
        echo "<td>{$car['brand']}</td>";
        echo "<td>{$car['model']}</td>";
        echo "<td>{$car['color']}</td>";
        echo "<td>{$car['engine_capacity']}</td>";
        echo "<td>{$car['horsepower']}</td>";
        echo "<td>{$car['transmission']}</td>";
        echo "<td>{$car['price']}</td>";
        echo "<td>{$car['category']}</td>";
        echo "<td>
                <button class='edit' onclick='editCar({$car['id']})'>Edit</button>
                <button class="delete" onclick="deleteCar(<?php echo $car['id']; ?>)">Delete</button>
              </td>";
        echo "</tr>";
    }
}
?>
        </tbody>
    </table>

    
    <form id="carForm"
          method="post"
          action="PHP/<?php echo $editCar ? 'update_car.php' : 'add_car.php'; ?>"
          enctype="multipart/form-data"
          style="display: <?php echo $openForm ? 'block' : 'none'; ?>;">

        <h3>Add / Edit Car</h3>
        
        <?php if ($editCar) echo '<input type="hidden" name="car_id" value="'.$editCar['id'].'">'; ?>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" value="<?php echo $editCar['brand'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model" value="<?php echo $editCar['model'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Color</label>
            <input type="text" name="color" value="<?php echo $editCar['color'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Engine Capacity (L)</label>
            <input type="text" name="engine_capacity" value="<?php echo $editCar['engine_capacity'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Horsepower (HP)</label>
            <input type="number" name="horsepower" value="<?php echo $editCar['horsepower'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Transmission</label>
            <select name="transmission">
                <option <?php if (($editCar['transmission'] ?? '') == 'Automatic') echo 'selected'; ?>>Automatic</option>
                <option <?php if (($editCar['transmission'] ?? '') == 'Manual') echo 'selected'; ?>>Manual</option>
                <option <?php if (($editCar['transmission'] ?? '') == 'CVT') echo 'selected'; ?>>CVT</option>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="<?php echo $editCar['price'] ?? ''; ?>">
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option>Family</option>
                <option>Sports</option>
            </select>
        </div>

        <div class="form-group">
            <label>Car Image</label>
            <input type="file" name="image">
        </div>

        <div class="form-actions">
            <button type="submit" class="save">Save</button>
            <button type="button" class="cancel" onclick="toggleForm()">Cancel</button>
        </div>
         <!-- error message-->
    <?php
if (!empty($carError)) {
    echo "<ul style='color:red; font-size:12px; margin-top:8px'>";
    echo "<li>$carError</li>";
    echo "</ul>";
}
?>
    </form>

</main>

</body>
</html>
