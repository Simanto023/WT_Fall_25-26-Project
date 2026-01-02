<?php
include __DIR__ . "/../DB/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
<?php
include __DIR__ . "/../DB/db.php";

$conn->query($sql);
    header("Location: ../manage_cars.php");
    exit;
?>