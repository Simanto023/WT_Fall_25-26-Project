<?php
include __DIR__ . "/../../DB/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["listing_id"];
    $comment = $_POST["admin_comment"];

    $sql = "UPDATE marketplace_listings 
            SET status='approved', admin_comment='$comment'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: ../View/admin_marketplace.php");
        exit;
    }
}
?>
