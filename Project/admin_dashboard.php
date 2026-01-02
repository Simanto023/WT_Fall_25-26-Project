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
            <a href="#" class="icon-link">
                <img src="images/announcement.png" alt="Announcements">
            </a>
            <a href="login.html" class="logout">Logout</a>
        </div>

    </div>
</header>

<main>

    <div class="welcome-card">
        <h2>Welcome back, Admin!</h2>
        <p>Here’s a quick overview of today’s system activity.</p>

        <div class="stats">
            <div>
                <strong>128</strong>
                <span>Total Cars</span>
            </div>
            <div>
                <strong>14</strong>
                <span>Active Orders</span>
            </div>
            <div>
                <strong>6</strong>
                <span>Pending Listings</span>
            </div>
            <div>
                <strong>9</strong>
                <span>Categories</span>
            </div>
        </div>
    </div>

    <div class="actions-wrapper">
        <div class="admin-actions">
            <a href="manage_Cars.php" class="admin-btn">Manage Cars</a>
            <a href="manage_category.php" class="admin-btn">Manage Categories</a>
            <a href="#" class="admin-btn">View Orders</a>
            <a href="admin_marketplace.php" class="admin-btn">Marketplace</a>
        </div>
    </div>

</main>

</body>
</html>
