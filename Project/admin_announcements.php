<?php
include __DIR__ . "/DB/db.php";

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

//deletes announcement that expires
$conn->query("DELETE FROM announcements WHERE expires_at <= NOW()");


$announcements = [];
$result = $conn->query("SELECT * FROM announcements ORDER BY expires_at ASC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $announcements[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Global Announcements | NG Auto</title>
    <link rel="stylesheet" href="css/admin_announcements.css">
</head>

<body>

<header>
    <div class="topbar">
        <div class="brand">
            <img src="images/logo.png">
            <span>NG AUTO</span>
        </div>
        <a href="admin_dashboard.php" class="back">← Back to Dashboard</a>
    </div>
</header>

<main>

<h2>Global Announcements</h2>

<form method="post" action="PHP/add_announcements.php" class="announcement-form">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" required>
    </div>

    <div class="form-group">
        <label>Message</label>
        <textarea name="message" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label>Expires At</label>
        <input type="datetime-local" name="expires_at" required>
    </div>

    <button type="submit" class="save">Publish Announcement</button>
</form>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Message</th>
            <th>Expires At</th>
        </tr>
    </thead>

    <tbody>
        <?php if (empty($announcements)): ?>
            <tr>
                <td colspan="3" style="text-align:center;">No active announcements</td>
            </tr>
        <?php endif; ?>

        <?php
        for ($i = 0; $i < count($announcements); $i++) {
            $a = $announcements[$i];
        ?>
        <tr>
            <td><?php echo htmlspecialchars($a['title']); ?></td>
            <td><?php echo htmlspecialchars($a['message']); ?></td>
            <td><?php echo date("d M Y, h:i A", strtotime($a['expires_at'])); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</main>

</body>
</html>
