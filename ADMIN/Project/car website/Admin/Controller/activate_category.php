<?php
include __DIR__ . "/../../DB/db.php";
//logic to redirect to manage_cars if link opened directly
if (!isset($_GET['id'])) {
    header("Location: ../View/manage_category.php");
    exit;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("UPDATE categories SET status='active' WHERE id=$id");
}

header("Location: ../View/manage_category.php");
exit;
?>