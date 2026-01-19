<?php
include __DIR__ . "/../../DB/db.php";
//logic to redirect to manage_cars if link opened directly
if (!isset($_GET['id'])) {
    header("Location: ../View/manage_cars.php");
    exit;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cars WHERE id = $id";
    $conn->query($sql);

    header("Location: ../View/manage_cars.php");
    exit;}
?>