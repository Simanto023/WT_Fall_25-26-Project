<?php
include __DIR__ . "/DB/db.php";

$orders = [];
$result = $conn->query("SELECT * FROM orders ORDER BY id DESC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Manage Orders | NG Auto</title>
    <link rel="stylesheet" href="css/admin_orders.css">
</head>

<body>

<header>
    <div class="topbar">
        <div class="brand">
            <img src="images/logo.png">
            <span>NG AUTO</span>
        </div>
        <a href="admin_dashboard.php" class="back">← Back</a>
    </div>
</header>

<main>

<h2>Customer Orders</h2>

<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Car Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Total ($)</th>
            <th>Status</th>
            <th>Update</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
<?php
for ($i = 0; $i < count($orders); $i++) {
    $order = $orders[$i];
?>
<tr>
    <td><?php echo $order['id']; ?></td>
    <td><?php echo $order['car_name']; ?></td>
    <td><?php echo $order['address']; ?></td>
    <td><?php echo $order['phone_number']; ?></td>
    <td><?php echo $order['total_amount']; ?></td>
    <td><?php echo ucfirst($order['status']); ?></td>

    <td>
        <form method="post" action="PHP/update_order_status.php">

            <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">

            <label>
                <input type="radio" name="status" value="confirmed"
                <?php if ($order['status'] == 'confirmed') echo 'checked'; ?>>
                Confirm
            </label>

            <label>
                <input type="radio" name="status" value="shipped"
                <?php if ($order['status'] == 'shipped') echo 'checked'; ?>>
                Ship
            </label>

            <label>
                <input type="radio" name="status" value="completed"
                <?php if ($order['status'] == 'completed') echo 'checked'; ?>>
                Complete
            </label>

            <label>
                <input type="radio" name="status" value="cancelled"
                <?php if ($order['status'] == 'cancelled') echo 'checked'; ?>>
                Cancel
            </label>

            <br><br>
            <button type="submit">Save</button>

        </form>
    </td>

    <td><?php echo date("d M Y", strtotime($order['created_at'])); ?></td>
</tr>
<?php } ?>
    </tbody>
</table>

</main>

</body>
</html>
