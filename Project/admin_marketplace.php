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
        <a href="admin_dashboard.html" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>

    <div class="page-header">
        <h2>Used Car Marketplace</h2>
    </div>

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
            <tbody>
<?php
if (!empty($listings)) {
    foreach ($listings as $row) {
        echo "<tr>";

        echo "<td>
                <img src='images/cars/{$row['image']}' class='car-thumb'>
              </td>";

        echo "<td>{$row['car_name']}</td>";
        echo "<td>{$row['brand']}</td>";
        echo "<td>{$row['location']}</td>";
        echo "<td>{$row['condition']}</td>";
        echo "<td>$ {$row['price']}</td>";
        echo "<td>{$row['phone_number']}</td>";
        echo "<td>{$row['status']}</td>";

        echo "<td>
                <button class='save'>Approve</button>
                <button class='cancel'>Reject</button>
                <button class='delete'>Delete</button>
              </td>";

        echo "</tr>";
    }
}
?>
</tbody>

        </tbody>
    </table>

</main>

</body>
</html>
