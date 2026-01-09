<?php 

include __DIR__ . "/DB/db.php";

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$adminId = $_SESSION['user_id']; //stores admin id from session
$carsCount = 0;
$activeOrders = 0;
$pendingListings = 0;
$categoryCount = 0;

$adminResult = $conn->query("SELECT full_name FROM users WHERE id = $adminId");
$adminName = "Admin";

if ($adminResult && $adminResult->num_rows == 1) {
    $row = $adminResult->fetch_assoc();
    $fullName = $row['full_name'];
    $adminName = explode(" ", $fullName)[0];
}

$resultcars = $conn->query("SELECT COUNT(*) AS total FROM cars");
if ($resultcars) {
    $carsCount = $resultcars->fetch_assoc()['total'];
}

$resultOrders = $conn->query("SELECT COUNT(*) AS total FROM orders WHERE status NOT IN ('completed', 'cancelled')");
if ($resultOrders) {
    $activeOrders = $resultOrders->fetch_assoc()['total'];
}

$resultlistings = $conn->query("SELECT COUNT(*) AS total FROM marketplace_listings WHERE status = 'pending'");
if ($resultlistings) {
    $pendingListings = $resultlistings->fetch_assoc()['total'];
}

$resultcategories = $conn->query("SELECT COUNT(*) AS total FROM categories");
if ($resultcategories) {
    $categoryCount = $resultcategories->fetch_assoc()['total'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | NG Auto</title>
    <link rel="stylesheet" href="css/admin_dashboard.css">
</head>

<body>

<header>
    <div class="topbar">

        <div class="brand">
            <img src="images/logo.png" alt="NG Auto">
            <span>NG AUTO</span>
        </div>

        <div class="nav-actions">
            <a href="admin_announcements.php" class="icon-link">
                <img src="images/announcement.png" alt="Announcements">
            </a>
            <a href="PHP/logout.php" class="logout">Logout</a>
        </div>

    </div>
</header>

<main>

    <div class="welcome-card">
        <h2>Welcome back,<?php echo $adminName; ?>!</h2>
        <p>Here’s a quick overview of today’s system activity.</p>

        <div class="stats">
            <div>
                <strong><?php echo $carsCount; ?></strong>
                <span>Total Cars</span>
            </div>
            <div>
                <strong><?php echo $activeOrders; ?></strong>
                <span>Active Orders</span>
            </div>
            <div>
                <strong><?php echo $pendingListings; ?></strong>
                <span>Pending Listings</span>
            </div>
            <div>
                <strong><?php echo $categoryCount; ?></strong>
                <span>Categories</span>
            </div>
        </div>
    </div>

    <div class="actions-wrapper">
        <div class="admin-actions">
            <a href="manage_Cars.php" class="admin-btn">Manage Cars</a>
            <a href="manage_category.php" class="admin-btn">Manage Categories</a>
            <a href="admin_orders.php" class="admin-btn">View Orders</a>
            <a href="admin_marketplace.php" class="admin-btn">Marketplace</a>
        </div>
    </div>

</main>

</body>
</html>
