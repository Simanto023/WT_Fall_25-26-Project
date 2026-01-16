<?php
include __DIR__ . "/../../DB/db.php";;
// block direct access
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../View/admin_orders.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['order_id'];
    $status = $_POST['status'];

    $conn->query("UPDATE orders SET status='$status' WHERE id=$id");

    header("Location: ../View/admin_orders.php");
    exit;
}
?>
