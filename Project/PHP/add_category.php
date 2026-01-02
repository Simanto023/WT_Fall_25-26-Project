<?php
include __DIR__ . "/../DB/db.php";
//logic to redirect to manage_cars if link opened directly
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../manage_category.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["category_name"];

    if (empty($name)) {
        header("Location: ../manage_category.php?error=1");
        exit;
    }

    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    $conn->query($sql);

    header("Location: ../manage_category.php");
    exit;
}
?>