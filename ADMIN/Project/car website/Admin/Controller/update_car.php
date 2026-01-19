<?php
include __DIR__ . "/../../DB/db.php";
//logic to redirect to manage_cars if link opened directly
if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['car_id'])) {
    header("Location: ../View/manage_cars.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['car_id'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $engine = $_POST['engine_capacity'];
    $hp = $_POST['horsepower'];
    $transmission = $_POST['transmission'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "UPDATE cars SET
            brand='$brand',
            model='$model',
            color='$color',
            engine_capacity='$engine',
            horsepower='$hp',
            transmission='$transmission',
            price='$price',
            category='$category'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: ../View/manage_cars.php");
        exit;
    }
}
?>