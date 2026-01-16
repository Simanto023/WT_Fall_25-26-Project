<?php
session_start();

// block access if not logged in or not admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
include __DIR__ . "/../../DB/db.php";


$listings = [];
$filterStatus = "all";
if (isset($_GET["status"])) {
    $filterStatus = $_GET["status"];
}

if ($filterStatus == "all") {
    $sql = "SELECT * FROM marketplace_listings ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM marketplace_listings 
            WHERE status = '$filterStatus' 
            ORDER BY id DESC";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $listings[] = $row;
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Marketplace Moderation | NG Auto</title>
    <link rel="stylesheet" href="css/admin_marketplace.css">
</head>

<body>

<header>
    <div class="topbar">
        <div class="brand">
            <img src="../../images/logo.png" alt="NG Auto">
            <span>NG AUTO</span>
        </div>
        <a href="admin_dashboard.php" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>

<div class="page-header">
    <h2>Used Car Marketplace</h2>
</div>
<form method="get" style="margin-bottom:20px;">
    <label style="margin-right:10px;">Filter by status:</label>
<select name="status">
    <option value="all" <?php if ($filterStatus=="all") echo "selected"; ?>>All Listings</option>
    <option value="pending" <?php if ($filterStatus=="pending") echo "selected"; ?>>Pending</option>
    <option value="approved" <?php if ($filterStatus=="approved") echo "selected"; ?>>Approved</option>
    <option value="rejected" <?php if ($filterStatus=="rejected") echo "selected"; ?>>Rejected</option>
</select>
    <button type="submit">Apply</button>
</form>

<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Car Name</th>
            <th>Brand</th>
            <th>Location</th>
            <th>Condition</th>
            <th>Price</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
<?php
foreach ($listings as $row) {
    echo "<tr>";

    echo "<td><img src='../../images/cars/{$row['image']}' class='car-thumb'></td>";
    echo "<td>{$row['car_name']}</td>";
    echo "<td>{$row['brand']}</td>";
    echo "<td>{$row['location']}</td>";
    echo "<td>{$row['cond']}</td>";
    echo "<td>$ {$row['price']}</td>";
    echo "<td>{$row['phone_number']}</td>";
    echo "<td>{$row['status']}</td>";

    echo "<td>";

    if ($row['status'] == 'pending') {

        echo "
        <form method='post' action='../Controller/approve_listing.php' style='margin-bottom:6px;'>
            <input type='hidden' name='listing_id' value='{$row['id']}'>
            <textarea name='admin_comment' placeholder='Comment (optional)'
                style='width:100%; height:50px;'></textarea>
            <button type='submit' class='save'>Approve</button>
        </form>

        <form method='post' action='../Controller/reject_listing.php'>
            <input type='hidden' name='listing_id' value='{$row['id']}'>
            <textarea name='admin_comment' placeholder='Comment (optional)'
                style='width:100%; height:50px;'></textarea>
            <button type='submit' class='cancel'>Reject</button>
        </form>
        ";
    }


    else {
        echo "
        <form method='post' action='../Controller/delete_listing.php'
              onsubmit=\"return confirm('Delete this listing permanently?');\">
            <input type='hidden' name='listing_id' value='{$row['id']}'>
            <button type='submit' class='delete'>Delete</button>
        </form>
        ";
    }

    echo "</td>";
    echo "</tr>";
}
?>
    </tbody>
</table>

</main>

</body>
</html>
