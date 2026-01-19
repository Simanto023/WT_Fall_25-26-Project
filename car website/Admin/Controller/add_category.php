<?php
include __DIR__ . "/../../DB/db.php";
//logic to redirect to manage_cars if link opened directly
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../View/manage_category.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["category_name"];

    if (empty($name)) {
        header("Location: ../View/manage_category.php?error=1&openForm=1");
        exit;
    }
    $check = $conn->query("SELECT id FROM categories WHERE name='$name'");

    if ($check->num_rows > 0) {
        header("Location: ../View//manage_category.php?error=duplicate&openForm=1");
        exit;
    }

    $sql = "INSERT INTO categories (name) VALUES ('$name')";
    $conn->query($sql);

    header("Location: ../View/manage_category.php");
    exit;
}
?>