<?php
include __DIR__ . "/../DB/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $brand           = $_POST["brand"];
    $model           = $_POST["model"];
    $color           = $_POST["color"];
    $price           = $_POST["price"];
    $engine_capacity = $_POST["engine_capacity"];
    $horsepower      = $_POST["horsepower"];
    $transmission    = $_POST["transmission"];
    $category        = $_POST["category"];

    
}
?>
