<?php
include __DIR__ . "/../../DB/db.php";

// prevent direct access
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../View/admin_marketplace.php");
    exit;
}

$id = $_POST["listing_id"];

$sql = "DELETE FROM marketplace_listings WHERE id = $id";

if ($conn->query($sql)) {
    header("Location: ../View/admin_marketplace.php");
    exit;
}
?>