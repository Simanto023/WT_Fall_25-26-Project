<?php
include __DIR__ . "/DB/db.php";

$listings = [];

$sql = "SELECT * FROM marketplace_listings ORDER BY id DESC";
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
            <img src="images/logo.png" alt="NG Auto">
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
        <option value="all">All Listings</option>
        <option value="pending">Pending</option>
        <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
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

    echo "<td><img src='images/cars/{$row['image']}' class='car-thumb'></td>";
    echo "<td>{$row['car_name']}</td>";
    echo "<td>{$row['brand']}</td>";
    echo "<td>{$row['location']}</td>";
    echo "<td>{$row['condition']}</td>";
    echo "<td>$ {$row['price']}</td>";
    echo "<td>{$row['phone_number']}</td>";
    echo "<td>{$row['status']}</td>";

    echo "<td>";

    if ($row['status'] == 'pending') {

        echo "
        <form method='post' action='PHP/approve_listing.php' style='margin-bottom:6px;'>
            <input type='hidden' name='listing_id' value='{$row['id']}'>
            <textarea name='admin_comment' placeholder='Comment (optional)'
                style='width:100%; height:50px;'></textarea>
            <button type='submit' class='save'>Approve</button>
        </form>

        <form method='post' action='PHP/reject_listing.php'>
            <input type='hidden' name='listing_id' value='{$row['id']}'>
            <textarea name='admin_comment' placeholder='Comment (optional)'
                style='width:100%; height:50px;'></textarea>
            <button type='submit' class='cancel'>Reject</button>
        </form>
        ";
    }


    else {
        echo "
        <form method='post' action='PHP/delete_listing.php'
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
