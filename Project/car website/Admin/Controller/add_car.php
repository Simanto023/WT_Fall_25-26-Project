<?php
include __DIR__ . "/../../DB/db.php";


//logic to redirect to manage_cars if link opened directly
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../View/manage_cars.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $brand           = $_POST["brand"];
    $model           = $_POST["model"];
    $color           = $_POST["color"];
    $engine_capacity = $_POST["engine_capacity"];
    $horsepower      = $_POST["horsepower"];
    $transmission    = $_POST["transmission"];
    $price           = $_POST["price"];
    $category        = $_POST["category"];

    //empty
    if (
        empty($brand) || empty($model) || empty($color) ||
        empty($engine_capacity) || empty($horsepower) ||
        empty($transmission) || empty($price) || empty($category)||empty($_FILES["image"]["name"])
    ) {
        header("Location: ../View/manage_cars.php?error=1&openForm=1");
        exit;
    }

    //image 
     $image = time() . "_" . $_FILES["image"]["name"];
     $targetPath = __DIR__ . "/../../images/cars/" . $image;
     move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);


    //insert
    $sql = "INSERT INTO cars 
            (brand, model, color, engine_capacity, horsepower, transmission, price, category, image)
            VALUES 
            ('$brand', '$model', '$color', '$engine_capacity', '$horsepower',
             '$transmission', '$price', '$category', '$image')";

    if ($conn->query($sql)) {
        header("Location: ../View/manage_cars.php");
        exit;
    }

   
}
?>
